<!DOCTYPE html>
<html lang="en"> 
    <?= view('user.common.header') ?>
    <body>
        <?= view('user.common.navigator') ?>
        <section class="maincontent">
            <div class="container">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </section>
        <?= view('user.common.footer') ?>
  </body>
</html>