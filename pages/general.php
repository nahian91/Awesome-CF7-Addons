<?php
// General Page Callback
function acf7a_general_page() {
    $options = get_option('acf7a_options');
    $forms = get_posts(['post_type'=>'wpcf7_contact_form', 'numberposts'=>-1]);
    ?>
    <div class="wrap acf7a-wrap">
        <h4><?php esc_html_e('General Information', 'awesome-cf7-addons'); ?></h4>

        <div class="acf7a-general">
            <!-- Left Column: General Info -->
            <div class="acf7a-general-content">
                <div class="acf7a-banner"></div>

                <p><?php esc_html_e('Welcome to Awesome CF7 Addons! Enhance your Contact Form 7 experience with analytics, submissions tracking, reports, import/export, and integration with Elementor & Gutenberg.', 'awesome-cf7-addons'); ?></p>

                <p><?php esc_html_e('Use this page to manage general settings and configure default forms for your site. All plugin-wide options can be customized here.', 'awesome-cf7-addons'); ?></p>

                <p><?php esc_html_e('For documentation or support, please check our resources or contact us directly.', 'awesome-cf7-addons'); ?></p>

                <p><?php esc_html_e('Thank you for choosing Awesome CF7 Addons!', 'awesome-cf7-addons'); ?></p>

                <a href="https://wordpress.org/support/plugin/contact-form-7/reviews/" class="button button-primary" target="_blank">
                    <?php esc_html_e('Leave a Review', 'awesome-cf7-addons'); ?>
                </a>
            </div>

            <!-- Right Column: CF7 Forms + Support -->
            <div class="acf7a-general-support">
                
                <div class="acf7a-forms-statistics">
                    <h4><?php esc_html_e('Contact Form 7 Forms', 'awesome-cf7-addons'); ?></h4>
                    <table class="wp-list-table widefat fixed striped">
                        <thead>
                            <tr>
                                <th><?php esc_html_e('Form Title', 'awesome-cf7-addons'); ?></th>
                                <th><?php esc_html_e('ID', 'awesome-cf7-addons'); ?></th>
                                <th><?php esc_html_e('Shortcode', 'awesome-cf7-addons'); ?></th>
                                <th><?php esc_html_e('Action', 'awesome-cf7-addons'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($forms):
                                foreach ($forms as $form):
                                    $edit_link = admin_url('admin.php?page=wpcf7&post=' . $form->ID . '&action=edit'); ?>
                                    <tr>
                                        <td><?php echo esc_html($form->post_title); ?></td>
                                        <td><?php echo esc_html($form->ID); ?></td>
                                        <td>[contact-form-7 id="<?php echo esc_attr($form->ID); ?>"]</td>
                                        <td><a href="<?php echo esc_url($edit_link); ?>" target="_blank" class="button button-primary">Edit</a></td>
                                    </tr>
                                <?php endforeach;
                            else: ?>
                                <tr>
                                    <td colspan="4"><?php esc_html_e('No Contact Form 7 forms found.', 'awesome-cf7-addons'); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="acf7a-support-contact">
                    <h4><?php esc_html_e('Support & Contact', 'awesome-cf7-addons'); ?></h4>
                    <ul>
                        <li>
    <span class="dashicons dashicons-email"></span>
    <div id="acf7a-email-text">nahiansylhet@gmail.com</div>
    <button class="copy-btn button acf7a-copy-btn" data-target="#acf7a-email-text">
        <span class="dashicons dashicons-admin-page"></span>
    </button>
</li>
<li>
    <span class="dashicons dashicons-admin-site"></span>
    <div id="acf7a-website-text">www.devnahian.com</div>
    <button class="copy-btn button acf7a-copy-btn" data-target="#acf7a-website-text">
        <span class="dashicons dashicons-admin-page"></span>
    </button>
</li>
<li>
    <span class="dashicons dashicons-whatsapp"></span>
    <div id="acf7a-whatsapp-text">+8801686195607</div>
    <button class="copy-btn button acf7a-copy-btn" data-target="#acf7a-whatsapp-text">
        <span class="dashicons dashicons-admin-page"></span>
    </button>
</li>

                    </ul>
                </div>

            </div>
        </div>
    </div>
<?php
}
