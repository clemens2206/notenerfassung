<?php

$errors = [];

function validate($name, $email, $examDate, $subject, $grade){
    return validateName($name) & validateEmail($email) & validateExamDate($examDate)
        & validateGrade($grade) & validateSubject($subject);
}

function validateName($name)
{

    global $errors;

    if (strlene($name) == 0) {
        $errors['name'] = "Name darf nicht leer sein";
        return false;
    } else if (strlen($name) > 20) {
        $errors['name'] = "Name zu lang";
        return false;
    } else {
        return true;
    }
    #Hallo mein Freund
}

        function validateEmail($email)
        {

            global $errors;

            if($email != "" && !filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "E-Mail ungültig";
                return false;
            } else {
                return true;
            }
        }

function validateExamDate($examDate)
{

    global $errors;
    

    try {
        if ($examDate == "") {
            $errors['examDate'] = "Prüfungsdatum darf nicht leer sein!";
            return false;
        } else if (new DateTime($examDate) > new DateTime()) {
            $errors['examDate'] = "Prüfungsdatum darf nicht in der Zukunft liegen!";
            return false;
        } else {
            return true;
        }
    }catch (Exception $exception){
        $errors['examDate'] = "Prüfungsdatum ungültig";
        return false;
    }
}

            function validateSubject($subject)
            {

                global $errors;

                if ($subject != 'm' && $subject != 'e' && $subject != 'd') {
                    $errors['subject'] = "Fach ungültig!";
                    return false;
                } else {
                    return true;
                }
            }
   
                function validateGrade($grade)
                {

                    global $errors;

                    if (!is_numeric($grade) || $grade < 1 || $grade > 5) {
                        $errors['grade'] = "Note ungültig";
                        return false;
                    } else {
                        return true;
                    }
            }