<?php
    /* Require user to enter password */
    if( post_password_required() ) {
        echo '<p>' . esc_html__('This post is password protected. Enter the password to view any comments.', 'industrial') . '</p>';
        return;
    }

    /* Check if any comments are added */
    if( have_comments() ) {
        echo '<h4 id="comments" class="title">' . esc_html__('Comment on ', 'industrial') . '"' . get_the_title() . '"</h4>';

        /* List Comments */
        echo '<ol class="comments-list">';
        wp_list_comments(array( 'callback' => 'anps_comment' ));
        echo '</ol>';

        /* Comments pagination */
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
            previous_comments_link();
            next_comments_link();
        }
    } else {
        if ( ! comments_open() ) {
            echo '<p class="no-comments">' . esc_html__( 'Comments are closed.', 'industrial') . '</p>';
        }
    }

    /* Comment form fields */
    $fields =  array(
        'author' => '<fieldset class="form-group">
                        <input type="text" id="author" name="author" placeholder="'. esc_html__( 'Name', 'industrial').'">
                    </fieldset>',
        'email'  => '<fieldset class="form-group">
                        <input type="text" id="email" name="email" placeholder="'. esc_html__( 'E-mail', 'industrial').'">
                    </fieldset>'
    );

    /* Comment form arguments */
    $args = array(
        'fields'       => apply_filters( 'comment_form_default_fields', $fields),
        'title_reply'  => '',
        'class_submit' => 'btn btn-md'
    );

    /* If NOT logged in */
    $args_specific = array(
        'comment_field'        => '</div><div class="col-md-7">
                                        <fieldset class="form-group">
                                            <textarea id="message" placeholder="' . esc_html__("Comment", 'industrial') . '" name="comment" rows="2"></textarea>
                                        </fieldset>
                                    </div></div>',
        'logged_in_as'         => '<h4 class="title">' . esc_html__('Post comment', 'industrial') . '</h4>',
        'comment_notes_before' => '<h4 class="title">' . esc_html__('Post comment', 'industrial') . '</h4><div class="row contact-form"><div class="col-md-5">',
    );

    /* If logged in */
    if ( is_user_logged_in() ) {
        $args_specific = array(
            'comment_field'        => '<div class="col-md-12">
                                            <fieldset class="form-group">
                                                <textarea id="message" placeholder="' . esc_html__("Comment", 'industrial') . '" name="comment" rows="3"></textarea>
                                            </fieldset>
                                        </div></div>',
            'logged_in_as'         => '<h4 class="title">' . esc_html__('Leave a reply', 'industrial') . '</h4><div class="row contact-form">',
            'comment_notes_before' => '<h4 class="title">' . esc_html__('Leave a reply', 'industrial') . '</h4><div id="comment-form">',
        );
    }

    comment_form( array_merge($args, $args_specific) );
