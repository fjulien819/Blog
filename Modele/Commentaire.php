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

    public function getAllCom()
    {
      $sql = 'select COM_ID as id, COM_DATE as date,
      COM_AUTEUR as auteur, COM_CONTENU as contenu from  T_COMMENTAIRE';
      $commentaires = $this->executerRequete($sql);
      return $commentaires;
    }

    public function deleteCom($tab)
    {
      $sql = 'delete from T_COMMENTAIRE where COM_ID = :id';
      foreach ($tab as $idCommentaire) {
      $resultat[] = $this->executerRequete($sql, array(':id' => $idCommentaire ));
      }
      if (count($resultat) > 0)
      {
        return count($resultat) . " commentaire(s) supprimé(s)";
      }
      else
      {
        throw new \Exception("Aucun commentaire n'a pu être supprimé");
      }
    }


    public function getCom($idCom)
    {
      $sql = 'select * from T_COMMENTAIRE where COM_ID = :idCom';
      $result = $this->executerRequete($sql, array(':idCom' => $idCom ));
      return $result->fetch();

    }


    // renvoi le nombre de signalement pour un commentaire
    public function countReport($id)
    {
      $sql = 'select COM_SIGNALEMENT from t_commentaire where COM_ID = :id';
      $resultat = $this->executerRequete($sql, array(':id' =>$id ));
      return $resultat->fetchcolumn();

    }


    // ajoute un signalement a un commentaire
    public function addReport($id)
    {

      $nbrReport = $this->countReport($id);
      $newNbrReport = $nbrReport += 1;


      $sql = 'update t_commentaire set COM_SIGNALEMENT = :newNbrReport where COM_ID = :id';
      $resultat = $this->executerRequete($sql, array(':newNbrReport' => $newNbrReport, ':id' => $id ));

      if ($resultat->rowCount() > 0) {
        return "Le commentaire a été signalé";
      }
      else
      {
        throw new \Exception("Le commentaire n'a pu être signalé");
      }

    }

    // renvoi le nombre de commentaires signalé
    public function countComReport()
    {
      $sql = 'select * from t_commentaire where COM_SIGNALEMENT != "null"';
      $resultat = $this->executerRequete($sql);
      return ($resultat->rowCount());
    }


}
