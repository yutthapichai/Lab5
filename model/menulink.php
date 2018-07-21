<?php
require_once('../model/connect.php');
class menulink extends db{
    public function menupage($menuname) {
        if ($menuname == 'pr') {
            return $menuname = 'pr.php';
        } 
        else if ($menuname == 'po') {
            return $menuname = 'po.php';
        }
        else if ($menuname == 'prform') {
            return $menuname = 'prform.php';
        } 
        else if ($menuname == 'poformthai') {
            return $menuname = 'poformthai.php';
        } 
        else if ($menuname == 'poformlocal') {
            return $menuname = 'poformlocal.php';
        }
        else if ($menuname == 'inventory') {
            return $menuname = 'inventory.php';
        }
        else if ($menuname == 'material') {
            return $menuname = 'material.php';
        }
        else if ($menuname == 'unit') {
            return $menuname = 'unit.php';
        }
        else if ($menuname == 'shop') {
            return $menuname = 'shop.php';
        }
        else if ($menuname == 'warehouse') {
            return $menuname = 'warehouse.php';
        }
        else if ($menuname == 'category') {
            return $menuname = 'category.php';
        }
        else if ($menuname == 'jobsite') {
            return $menuname = 'jobsite.php';
        }
        else if ($menuname == 'accounting') {
            return $menuname = 'accounting.php';
        }
        else if ($menuname == 'boq') {
            return $menuname = 'boq.php';
        }
        else if ($menuname == 'financial') {
            return $menuname = 'financial.php';
        }
    }

}