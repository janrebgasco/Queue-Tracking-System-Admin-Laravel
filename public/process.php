

<?php
    //create loading
    //create conditions if isset and do the process

    if(isset($_POST['updateEmployeeForm'])){
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $contactNum = $_POST['contactNum'];
        $email = $_POST['email'];
        $counter = $_POST['counter'];

        echo "<p> . $fullname . $address . $contactNum . $email . $counter </p>";

        $database->getReference('config/website')
        ->set([
            'name' => 'My Application',
            'emails' => [
                'support' => 'support@domain.tld',
                'sales' => 'sales@domain.tld',
            ],
            'website' => 'https://app.domain.tld',
            ]);

        $database->getReference('config/website/name')->set('New name');
    }
    if(isset($_POST['deleteEmployee'])){
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $contactNum = $_POST['contactNum'];
        $email = $_POST['email'];
        $counter = $_POST['counter'];

        echo "<p> . $fullname . $address . $contactNum . $email . $counter </p>";

        $database->getReference('config/website')
        ->set([
            'name' => 'My Application',
            'emails' => [
                'support' => 'support@domain.tld',
                'sales' => 'sales@domain.tld',
            ],
            'website' => 'https://app.domain.tld',
            ]);

        $database->getReference('config/website/name')->set('New name');
    }else{
        echo "<p>NOTHING TO SHOW</p>";
    }
?>
