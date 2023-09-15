<?php

class Validation 
{
    
    public function __construct() {}

    /**
     * Email 
     */
    public function verifyEmail( $email ) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Verifies that a phoneno is valid.
     *
     * @param string $phoneno Phone number to verify.
     * @return string|bool Either false or the valid phone number.
     */
    public function verifyPhoneNumber( $phoneno ) {
        // if start form 0 then count 11
        if ( preg_match('/[0-9]/', $phoneno) && strlen($phoneno) == 11 ) return $phoneno;

        if ( preg_match('/[+0-9]/', $phoneno) && strlen($phoneno) == 14 ) return $phoneno;

        if( preg_match('/^234[0-9]{11}/', $phoneno) ) return $phoneno;
        
        return false;
    }

    /**
     * Check Password
     * 
     * @param string password
     * @return string $password 
     */
    public function checkPassword( $password ) {
        //$uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        //$specialChars = preg_match('@[^\w]@', $password);

        if( !$lowercase || !$number || strlen($password) < 8 ) {
            //$password = 'Your password should contain atleast 8 characters with number and characters';
            $password = '';
        }

        return $password;
    }
}
