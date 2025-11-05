<?php
namespace App\Models;
 
use App\Core\AbstractUser;
use App\Core\AuthInterface;
 
class RegularUser extends AbstractUser implements AuthInterface {
	public function userRole() {
    	return "Regular User";
	}
 
	public function login($email, $password) {
    	if ($email === $this->email && password_verify($password, $this->password)) {
        	return "User logged in successfully.";
    	}
    	return "Invalid credentials.";
	}
 
	public function logout() {
    	return "User logged out.";
	}

	public function register($name, $email, $password) {
		$this->name = $name;
		$this->email = $email;
		$this->password = password_hash($password, PASSWORD_BCRYPT);
		return "User registered successfully.";
	}

	public function isAuthenticated() {
		// This is a placeholder implementation.
		// In a real application, you would check session or token validity.
		return isset($this->email);
	}
}
?>
