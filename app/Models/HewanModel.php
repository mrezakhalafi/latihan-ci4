<?php

namespace App\Models;

use CodeIgniter\Model;

class HewanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'hewan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getHewan()
    {
        $this->join('owner', 'owner.id_hewan = hewan.id');
        $hewan = $this->paginate(10, 'hewan');

        // dd($hewan);
        return $hewan;
    }

    public function search($keyword)
    {

        // $search = $this->get_where(['nama_hewan', $keyword]);
        // $search = $this->table('hewan')->like('nama_hewan', $keyword);

        $this->join('owner', 'owner.id_hewan = hewan.id');
        $this->like('nama_hewan', $keyword)->orLike('harga_hewan', $keyword)->orLike('nama_owner', $keyword);
        $hewan = $this->paginate(10, 'hewan');
        return $hewan;
    }
}
