<?php

namespace App\Models;

use App\Models\Database;

class Brand
{
    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getBrands()
    {
        $query = "SELECT * FROM Brands";
        return $this->db->fetchAll($query);
    }

    public function getBrandById($id)
    {
        $query = "SELECT * FROM Brands WHERE Brand_ID = ?";
        return $this->db->fetch($query, [$id]);
    }

    public function addBrand($data)
    {
        $query = "INSERT INTO Brands (Brand_Name) VALUES (?)";
        return $this->db->execute($query, [$data['name']]);
    }

    public function updateBrand($data)
    {
        $query = "UPDATE Brands SET Brand_Name = ? WHERE Brand_ID = ?";
        return $this->db->execute($query, [$data['name'], $data['id']]);
    }

    public function deleteBrand($id)
    {
        $query = "DELETE FROM Brands WHERE Brand_ID = ?";
        return $this->db->execute($query, [$id]);
    }

}
