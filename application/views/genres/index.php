<h2><?= $title; ?></h2>
<hr>
<ul class="list-group">
    <?php foreach ($genres as $genre) : ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class=" float-left">
                <a class="nav-link " href="<?php echo base_url(); ?>genres/<?php echo $genre['id']; ?>">
                    <?php echo $genre['name'] . str_repeat('&nbsp;', 5); ?>
                    <span class=" badge badge-primary badge-pill">
                        <?php echo $genre['count']; ?>
                    </span>
                </a>
            </div>
            <div class="float-right">
                <?php if ($this->user_model->check_user_admin() && $genre['id'] != 1) : ?>
                    <form action="<?php echo base_url('genres/delete/' . $genre['id']); ?>">
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                <?php endif; ?>
            </div>
        </li>
    <?php endforeach; ?>
</ul>