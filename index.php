<?php require_once('includes/header.php') ?>
<!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->

                    <div class="card mb-4">

                        <?php
                            $posts = conseguirPosts($db);
                            if(!empty($posts)):
                            while($post = mysqli_fetch_assoc($posts)):
                        ?>
                        <div class="card-body">
                            <h2 class="card-title"><?= $post['titulo'] ?></h2>
                            <p class="card-text"><?= substr($post['descripcion'], 0, 150). "..." ?></p>
                            <a class="btn btn-primary" href="#!">Leer más</a>
                        </div>
                    <?php
                    endwhile;
                    endif;
                    ?>
                    </div>


                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                        </ul>
                    </nav>
                </div>
            <!--Side-->
                <?php require_once('includes/side.php') ?>


                <?php require_once('includes/footer.php') ?>
