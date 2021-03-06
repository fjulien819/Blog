<?php
namespace App\Modele;
use App\Framework\DAO;

/**
 * Fournit les services d'accès aux genres musicaux
 *
 * @author Baptiste Pesquet
 */
class CommentaireDAO extends DAO {

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet) {
        $sql = 'select COM_ID as id, DATE_FORMAT(COM_DATE, "%d/%m/%Y à %Hh%i") as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
                . ' where BIL_ID=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(?, ?, ?, ?)';
        $date = date("Y-m-d H:i:s");

        $result = $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
        if (count($result) > 0)
        {
          return "Commentaire publié";
        }
        else
        {
          throw new \Exception("Aucun commentaire n'a pu être supprimé");
        }
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
      $sql = 'select COM_ID as id, DATE_FORMAT(COM_DATE, "%d/%m/%Y à %Hh%i") as date,
      COM_AUTEUR as auteur, COM_CONTENU as contenu from  T_COMMENTAIRE where COM_SIGNALEMENT IS NULL ORDER BY date desc';
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
      $sql = 'select * from t_commentaire where COM_SIGNALEMENT IS NOT NULL';
      $resultat = $this->executerRequete($sql);
      return ($resultat->rowCount());
    }
    // renvoi la liste des commentaires signalé
    public function getComReport()
    {

      $sql = 'select COM_ID as id, DATE_FORMAT(COM_DATE, "%d/%m/%Y à %Hh%i") as date,
      COM_AUTEUR as auteur, COM_CONTENU as contenu, COM_SIGNALEMENT as signalement from  T_COMMENTAIRE where COM_SIGNALEMENT IS NOT NULL ORDER BY COM_SIGNALEMENT desc';
      $resultat = $this->executerRequete($sql);
      if($resultat->rowCount() > 0 )
      {
        return $resultat;
      }
      return false;
    }

    public function resetReport($id)
    {
      $sql = 'update t_commentaire set COM_SIGNALEMENT = null where COM_ID = :id';
      $resultat = $this->executerRequete($sql, array(':id' => $id ));
      if($resultat->rowCount() > 0)

      return 'Les signalements de ce commentaire ont été réinitialisé';
      else
      {
        throw new \Exception("Le commentaire n'a pu être réinitialisé");
      }

    }


}
