<?php

class User {
    public $name;
    public $email;
    private $purchaseHistory = [];

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getUser() {
        return "{$this->name} — {$this->email}";
    }

    public function addToPurchaseHistory($sessionId, $date) {
        $this->purchaseHistory[] = ['sessionId' => $sessionId, 'date' => $date];
    }

    public function getPurchaseHistory() {
        return $this->purchaseHistory;
    }
}
?>
