<?php
    require_once('response.php');
    class database
    {
        function __construct($pdo)
        {
            $this->response = new response();
            $this->pdo = $pdo;
        }

        function getLeads()
        {
            $query = $this->pdo->prepare('SELECT * FROM leads');
            $query->execute();
            return $query->fetchAll();
        }

        function createLead($arr) {
            try {
                $query = $this->pdo->prepare("INSERT INTO `leads` 
                    (`id`, `full_name`, `email`, `phone`, `inquiry_message`)
                    VALUES (NULL, :full_name, :email, :phone, :inquiry_message);");
                $query->bindParam(':full_name', $arr['full_name'], PDO::PARAM_STR, 100);
                $query->bindParam(':email', $arr['email'], PDO::PARAM_STR, 100);
                $query->bindParam(':phone', $arr['phone'], PDO::PARAM_STR, 50);
                $query->bindParam(':inquiry_message', $arr['inquiry_message'], PDO::PARAM_STR);
                if($query->execute()) {
                    return $this->response->success(['message' => 'Thank you for sending a message. We are looking into it now.']);
                } else {
                    $this->response->error(['message' => 'Error sending message. Please try again later.']);
                }
            } catch(Exception $e) {
                die($e);    
            }
        }

        function newsletterSubscribe($email) {
            try {
                $query = $this->pdo->prepare("INSERT INTO `newsletter_leads` 
                    (`id`, `email`)
                    VALUES (NULL, :email);");

                $query->bindParam(':email', $email, PDO::PARAM_STR, 100);

                if($query->execute()) {
                    return 'Added to mailing list';
                } else {
                    return 'Error adding subscribing. please try again laer';
                }
                
            } catch(Exception $e) {
                die($e);    
            }
        }
    }
?>