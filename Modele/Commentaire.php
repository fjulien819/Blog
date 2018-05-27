<?php
namespace App\Modele;
use App\Framework\Modele;

/**
 * Fournit les services d'accès aux genres musicaux
 *
 * @author Baptiste Pesquet
 */
class Commentaire extends Modele {

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet) {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
                . ' where BIL_ID=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(?, ?, ?, ?)';
        $date = date("Y-m-d H:i:s");

        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }
   /**
    * Renvoie le nombre total de commentaires
    *
    * @return int Le nombre de commentaires
    */
    public function getNombreCommentaires()
    {
       $sql = 'select count(*) as nbCommentaires from T_COMMENTAIRE';
       $resultat = $this->executerRequete($sql);
       $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne
       return $ligne['nbCommentaires'];
    }
}
