<?php

/**
 * Plugin Name: salim contact
 * Description: Handle the contact form.
 * author:salim.
 */

// contact form 


function html_form_code() {
    ?>
   <form action=" <?= esc_url( $_SERVER['REQUEST_URI'] )?> " method="post">
    <p>
    Your Name (required) <br />
    <input type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value=" <?= isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ?>" size="40" />
    </p>
    <p>
    Your Email (required) <br />
    <input type="email" name="cf-email" value="<?= isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : ''?>" size="40" />
    </p>
    <p>Subject (required) <br />
        <input type="text" name="cf-subject" pattern="[a-zA-Z ]+" value="<?= isset( $_POST["cf-subject"] ) ? esc_attr( $_POST["cf-subject"] ) : '' ?> " size="40" />
    </p>
    <p>
    Your Message (required) <br />
    <textarea rows="10" cols="35" name="cf-message"><?= isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' ?> </textarea>
    </p>
    <p><input type="submit" name="cf-submitted" value="Send"/></p>
    </form>
    <?php
}

function proccess_email() {

    // if the submit button is clicked, send the email
    if ( isset( $_POST['cf-submitted'] ) ) {
        // sanitize form values
        $name    =  $_POST["cf-name"] ;
        $email   =$_POST["cf-email"] ;
        $subject = $_POST["cf-subject"] ;
        $message = $_POST["cf-message"] ;
        // get the blog administrator's email address
        saveDataToTable($email,$name,$message,$subject);?>
        <div class="alert alert-success" style="font-weight:bold;border:sloid black 1px;border-radius: 5px">
            message sent to admins!
        </div>
<?php
    }
}
function cf_shortcode() {
    ob_start();
    proccess_email();
    html_form_code();

    return ob_get_clean();
}
function createTable(){
    global $wpdb;
    $qr=$wpdb->query("CREATE TABLE IF NOT EXISTS `wp_contact_plugin_salim` ( `id` INT NOT NULL AUTO_INCREMENT , `email` TEXT NOT NULL , `name` TEXT NOT NULL , `subject` TEXT NOT NULL , `message` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
}
function deleteTable(){
    global $wpdb;
    $qr=$wpdb->query("DROP TABLE IF EXISTS `wp_contact_plugin_salim`;");
}
function saveDataToTable($email,$name,$message,$subject){
    global $wpdb;
    $sr=$qr=$wpdb->query("INSERT INTO `wp_contact_plugin_salim` (`id`, `email`, `name`, `subject`, `message`) VALUES (NULL, '{$email}', '{$name}', '{$subject}', '{$message}');");
}
add_shortcode( 'sitepoint_contact_form', 'cf_shortcode' );
add_action('activate_contact-us-test/main.php',function(){
    createTable();
});

add_action('deactivate_contact-us-test/main.php',function(){
    deleteTable();
});

add_action('admin_menu', 'contact_form_add_menu_fun');
function contact_form_add_menu_fun() {

    add_menu_page(
        'List of received messages',
        'My contact form',
        'edit_posts',
        'menu_slug',
        'list_received_emails'
        ,
        'dashicons-media-spreadsheet'

    );
}
function list_received_emails(){
    global $wpdb;
    $results=$qr=$wpdb->get_results("SELECT * FROM `wp_contact_plugin_salim` ;");
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <h5>Contact emails</h5>
        <table class="table">
            <?php if(count($results)<1){?>
                <div class="alert alert-danger">
                    you do not have any incoming messages yet!
                </div>
            <?php }else{?>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Name</th>
                <th>Sublect</th>
                <th>Message</th>
            </tr>
            <?php }  foreach($results as $entry){?>
            <tr>
                <td><?= $entry->id ?></td>
                <td><?= $entry->email?></td>
                <td><?= $entry->name ?></td>
                <td><?= $entry->subject ?></td>
                <td><?= $entry->message ?></td>
            </tr>
            <?php }?>

        </table>
    <?php
}