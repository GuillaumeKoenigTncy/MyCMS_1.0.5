<?php
$perms = fileperms('../install');

//echo $_SERVER['DOCUMENT_ROOT'];

//echo substr(sprintf('%o', fileperms('/')), -4);



if (($perms & 0xC000) == 0xC000) {
    // Socket
    $info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
    // Lien symbolique
    $info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
    // Régulier
    $info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
    // Block special
    $info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
    // Dossier
    $info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
    // Caractère spécial
    $info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
    // pipe FIFO
    $info = 'p';
} else {
    // Inconnu
    $info = 'u';
}

// Autres
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
            (($perms & 0x0800) ? 's' : 'x' ) :
            (($perms & 0x0800) ? 'S' : '-'));

// Groupe
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
            (($perms & 0x0400) ? 's' : 'x' ) :
            (($perms & 0x0400) ? 'S' : '-'));

// Tout le monde
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
            (($perms & 0x0200) ? 't' : 'x' ) :
            (($perms & 0x0200) ? 'T' : '-'));



if (intval(substr(sprintf('%o', fileperms('../install')), -4)) < 764)
{
	echo '<div class="alert alert-danger" role="alert">
	<p>

	Votre dossier d\' installation ne correspond pas aux permissions demandées. Votre permission est de '.  substr(sprintf('%o', fileperms('/')), -4) . ' (' . $info
	.') au lieu de 777 (ou 0777) !<br />Veuillez changez les permissions ou contactez votre administrateur !'

	.'</p>
	</div>';
}
else
{
	echo '<div class="alert alert-success" role="alert">
	<p>Permission optimale pour l\'installation du site.</p>
	</div>';
}


if(file_exists('../config') || (file_exists('../xml')))
{
    echo '<div class="alert alert-danger" role="alert">
    <p>Des dossiers d\'une ancienne version sont encore présents sur le serveur. Veuillez supprimez les dossiers suivants: <br />
    - <strong>config</strong> <br />
    - <strong>xml</strong></p>
    </div>';
}

?>