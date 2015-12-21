<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Tags;

class functionally extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $domain, $count, $allLinks, $process_page, 
              $index_current, $limit_page, $find_character;

    public function crawler(Request $request)
    {
        $this->allLinks = array();
        if($request->server('REQUEST_METHOD') == "POST")
        {
            $domain       = strpos($request->domainURL, "http://") !== false ? $request->domainURL : "http://".$request->domainURL;
            $this->domain = $domain;  
            $this->count  = $request->limitPages;
            $this->index_current = 0;
            $this->limit_page = $request->limitPages;
            $this->allLinks[0] = array(
                "page" => $domain,
                "status" => "",
                "mark"  => ""
            );
            $this->find_character = $request->checkCharacter;
            $this->spider($domain);
        }

        $allLinks = $this->allLinks;
        $qGetTags = Tags::all();
        $qGetCategories = Categories::where('cID', '!=', 1)->get();
        return view('functionally.crawler', compact('qGetTags', 'qGetCategories', 'allLinks'));
    }

    public function spider($domain)
    {
        $content = $this->get_content_url($domain);
        $array_link = $this->get_link_array($content);
        $process_link = $this->get_process_link($array_link);
        foreach ($this->allLinks as $link) {
            if($link["status"] == "" && $this->index_current < $this->limit_page)
            {
                $this->index_current ++ ;
                $this->spider($link['page']);
            }
            else if( $this->index_current >= $this->limit_page )
            {
                break;
            }
        }
    }

    public function get_content_url($url)
    {
        $content_url = file_get_contents($url);
        $this->allLinks[$this->index_current]["status"] = get_headers($url)[0];
        if($this->find_character)
        {
            if(strpos($content_url, $this->find_character) !== false)
            {
                $this->allLinks[$this->index_current]["mark"] = "1";
            }
        }
        return $content_url;
    }

    public function get_link_array($content)
    {
        return explode("href=", $content);
    }

    public function get_process_link($array_link)
    {
        $extension = ".css,.js,.jpeg,.jpg,.bmp,.gif,.png,.cfc,.swf,.pdf,.ico,.xml,.xls,.doc,.exe,.jar,.tar,.mp3,:void,mailto:";
        $array_extentsion = explode(",", $extension);
        $temp = "" ;
        $pageLinksStruct = (object) array();
        for( $i = 1; $i < count($array_link); $i++ )
        {
            $insert = true;
            if($this->count >= count($this->allLinks))
            {
                if(strpos($array_link[$i], ">"))
                {
                    
                    $temp = substr($array_link[$i], 0, strpos($array_link[$i], ">")) . " ";
                    $temp = substr($temp, 0, strpos($temp, " "));
                    $temp = preg_replace("/=|>|;|\'|\"/", "", $temp);
                    $temp = $this->remove_slash($temp);
                    foreach ($array_extentsion as $exe) 
                    {
                        if(strpos(strtolower($temp), $exe))
                        {
                            $insert = false;
                            break;
                        }
                    }

                    if($insert)
                    {
                        if(mb_substr($temp, 0, 1) == "/")
                        {
                            $temp = $this->domain . $temp;
                        }
                        if(!isset($this->allLinks[$temp]) && $temp && strpos($temp, $this->domain) !== false)
                        {

                            $newPage =  array(
                                    "page" => $temp,
                                    "status" => "",
                                    "mark"  => ""
                            );
                            array_push($this->allLinks, $newPage);
                        }
                    }
                }
            }
            else
            {
                break;
            }
        }
    }

    public function remove_slash($link)
    {
        if(substr($link, -1) == "/" )
        {
            $link = substr_replace($link ,"", -1);
        }
        return $link;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        dd("aaaaa");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
