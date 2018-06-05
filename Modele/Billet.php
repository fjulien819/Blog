<?php
namespace App\Modele;
use App\Framework\Modele;

/**
 * Fournit les services d'accès aux genres musicaux
 *
 * @author Baptiste Pesquet
 */
class Billet extends Modele {

    /** Renvoie la liste des billets du blog
     *
     * @return \PDOStatement La liste des billets
     */
    public function getBillets() {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' order by BIL_ID desc';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    /** Renvoie les informations sur un billet
     *
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws \Exception Si l'identifiant du billet est inconnu
     */
    public function getBillet($idBillet) {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' where BIL_ID=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new \Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

    /**
     * Renvoie le nombre total de billets
     *
     * @return int Le nombre de billets
     */
    public function getNombreBillets() {
    $sql = 'select count(*) as nbBillets from T_BILLET';
    $resultat = $this->executerRequete($sql);
    $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne
    return $ligne['nbBillets'];
}

    public function delete($id)
    {
      $sql = 'delete from T_BILLET where BIL_ID = :id';
      $resultat = $this->executerRequete($sql, array(':id' => $id));

      if ($resultat->rowCount() > 0)
      {
        return "Le billet a bien été supprimé";
      }
      else
      {
        throw new \Exception("Aucun billet ne correspond à l'identifiant " . $id );
      }

    }

    public function update($id, $titre, $contenu)
    {

      $sql = 'update T_billet set BIL_TITRE = :titre, BIL_CONTENU = :contenu  WHERE BIL_ID = :id';
      $resultat = $this->executerRequete($sql, array(
        ':titre' => $titre,
        ':contenu' => $contenu,
        ':id' => $id
      ));

      if ($resultat->rowCount() > 0)
      {
        return "Le billet a bien été modifié";
      }
      else
      {
        throw new \Exception("Le billet " . $titre . " n'a pu être modifié");
      }

    }


}
