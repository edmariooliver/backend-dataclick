<?php

namespace App\Repositories;

use App\Models\Invoice;
use App\Repositories\Contracts\RepositoryInterface;
use App\Models\Signature;

class SignatureRepository implements RepositoryInterface
{
    
    /**
     * @var \App\Models\Signature $entity
     */
    protected $entity;

    /**
     * 
     */
    public function __construct(Signature $Signature)
    {
        $this->entity = $Signature;
    }

    /**
     * 
     */
    public function findById($id)
    {
        return $this->entity
            ->join("users", "users.id", "signatures.id_user")
            ->join("clubs", "signatures.id_club", "clubs.id")
            ->join("status_signatures", "status_signatures.id", "signatures.status_signature")
            ->where("signatures.id", $id)
            ->select("signatures.id", "users.name as user", "clubs.name as club", "status_signatures.description as status")
            ->first();
    }

    /**
     * 
     */
    public function findAll()
    {
        return $this->entity
            ->join("users", "users.id", "signatures.id_user")
            ->join("clubs", "signatures.id_club", "clubs.id")
            ->join("status_signatures", "status_signatures.id", "signatures.status_signature")
            ->select("signatures.id", "users.name as user", "clubs.name as club", "status_signatures.description as status")
            ->orderBy("signatures.id", "DESC")
            ->get();
    }

    /**
     * 
     */
    public function destroy(int $id)
    {
        return $this->entity->destroy($id);
    }

    /**
     * 
     */
    public function update(int $id, Array $Signature)
    {
        if($this->entity->find($id) == NULl) {
            return false;
        }
        return $this->entity->where("id", $id)->update($Signature);
    }

    /**
     * 
     */
    public function create(array $Signature)    
    {
        return $this->entity->create($Signature);
    }

    /**
     * 
     */
    public function findByUserAndClub(Int $idUser, Int $clubId)
    {
        return $this->entity
            ->where("id_user", $idUser)
            ->where("id_club", $clubId)
            ->first();
    }

    /**
     * 
     */
    public function findByClubId(Int $clubId)
    {
        return $this->entity
            ->where("id_club", $clubId)
            ->join("users", "signatures.id_user", "users.id")
            ->join("status_signatures", "status_signatures.id", "signatures.status_signature")
            ->select("signatures.*", "status_signatures.description as status_signature", "users.name as username")
            ->get();
    }

    /**
     * 
     */
    public function findByUserId(Int $userId)
    {
        return $this->entity
            ->join("users", "users.id", "signatures.id_user")
            ->join("clubs", "signatures.id_club", "clubs.id")
            ->join("status_signatures", "status_signatures.id", "signatures.status_signature")
            ->where("users.id", $userId)
            ->select("signatures.id", "users.name as user", "clubs.name as club", "status_signatures.description as status")
            ->first();
    }

    /**
     * 
     */
    public function checkStatusSignatureDefaulter()
    {
        return $this->entity
            ->select("*")
            ->join("invoices as inv", "inv.id_signature", "signatures.id")
            ->where("inv.status", "=", Invoice::STATUS_INVOICE_DUE)
            ->groupBy("inv.id")
            ->update(["signatures.status_signature" => Signature::STATUS_SIGNATURE_DEFAULTER]);
    }
}
