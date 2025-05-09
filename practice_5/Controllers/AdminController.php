<?php

namespace guestbook\Controllers;;

class AdminController {

    // TODO 3.raw: CODE by REQUEST METHODS (ACTIONS) GET, POST, etc. (handle data from request): 1) validate 2) working with data source 3.raw) transforming data
    public function execute()
    {
        if (empty($_SESSION['auth'])) {
            header('Location: /');
            die;
        }

        $arguments = [];

        $this->renderView($arguments);
    }

    // TODO 4: RENDER: 1) view (html) 2) data (from php)
    public function renderView($arguments = []) {
        ?>

            <!DOCTYPE html>
            <html>

            <?php require_once 'ViewSections/sectionHead.php' ?>

            <body>

            <div class="container">

                <!-- navbar menu -->
                <?php require_once 'ViewSections/sectionNavbar.php' ?>
                <br>

                <!-- guestbook section -->
                <div class="card card-primary">
                    <div class="card-header bg-warning text-light">
                        Admin
                    </div>
                    <div class="card-body">

                        <!-- TODO: render php data   -->

                    </div>
                </div>
            </div>

            </body>
            </html>

        <?php
    }
}