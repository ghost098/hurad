<?php $latestPosts = ClassRegistry::init('Post')->getLatestPosts($data['count']); ?>

<ul class="list-unstyled">
    <?php
    if (count($latestPosts) > 0) {
        foreach ($latestPosts as $post) {
            $this->Post->setPost($post);
            echo '<li>' . $this->Html->link(
                    $this->Post->getTheTitle(),
                    $this->Post->getPermalink(),
                    [
                        'title' => __d('hurad', 'Permalink to %s', $this->Post->theTitleAttribute()),
                        'escape' => false
                    ]
                ) . '</li>';
        }
    } else {
        echo '<li>' . __d('hurad', 'No posts were found') . '</li>';
    }
    ?>
</ul>
