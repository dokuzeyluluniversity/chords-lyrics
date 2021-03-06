<h2 class="artist-delete"><i class="fa fa-folder"></i></h2>
<h2 class="artist-delete"><?php echo str_repeat('&nbsp;', 2); ?><?= $title; ?></h2>
<hr>
<ul class="list-group">
    <?php if ($songs) : ?>
        <?php foreach ($songs as $song) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="float-left">
                    <h4 class="artist-delete"><i class="fa fa-music"></i></h4>
                    <a class="nav-link artist-delete" href="<?php echo base_url(); ?>songs/<?php echo $song['id']; ?>">
                        <?php echo $song['name']; ?>
                    </a>
                </div>
                <div class="float-right">
                    <?php if ($this->user_model->check_user_admin() || $this->repertory_model->check_user_owner_repertory($repertory['id'])) : ?>
                        <form class="artist-delete" action="<?php echo base_url(); ?>repertories/remove_song_from_repertory" method="POST">
                            <input type="hidden" name="repertory_id" value="<?php echo $repertory['id']; ?>">
                            <input type="hidden" name="song_id" value="<?php echo $song['id']; ?>">
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    <?php endif; ?>
                </div>
            </li>
        <?php endforeach; ?>
    <?php else : ?>
        <p>This repertory is empty</p>
    <?php endif; ?>
</ul>
<?php if ($this->user_model->check_user_admin() || $this->repertory_model->check_user_owner_repertory($repertory['id'])) : ?>
    <hr>
    <a href="<?php echo base_url(); ?>repertories/edit/<?php echo $repertory['id']; ?>" class="btn btn-secondary">Edit</a>
    <div class="float-right">
        <?php echo form_open('/repertories/delete/' . $repertory['id']); ?>
        <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>
<?php endif; ?>