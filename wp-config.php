<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'casa_verde' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1#8<m6WJux,A`6,;Bu@uqTU`EMk=,NugXQ-z4!}0#8s)3sKR+hsTXk/VUd;$f)Fk' );
define( 'SECURE_AUTH_KEY',  'VP`$WZ)@Zkc7_%D22^#haQ$n,x!UN(BP-j:x/5BK[H^#zx-!R9qu_FY8VgZ!i8*z' );
define( 'LOGGED_IN_KEY',    'ueWBd>@T+x|Rd=2[.lVYN%bUW{X3PS+S/QU0~Wz]4NeLd%FsR7TxtMp-lE^[DUYy' );
define( 'NONCE_KEY',        'M-+Z.**lhB=rn~8CABC<eHOdk{>Y78M^vSkN9aR}=c.QbD y=T#iNfM:iN~fB3YG' );
define( 'AUTH_SALT',        'G7!7D`HzlKAz9M_0U;TrI}pdL*Ozfc7U/A-vbnqu>o=R=_#/U9RFkz%CWP>8;j=-' );
define( 'SECURE_AUTH_SALT', 's7*@IyQ~n!p%TsDA*M*l@(rzH10:`r9q.%P^.E{.8v%7GfSbO  W]~WaS%Rq@n;C' );
define( 'LOGGED_IN_SALT',   'ilE&vx8+AOr:m,+_W*!E:=?F3io:+ci.m$<CDP2fT>[->leUB@v.9pW[_F]zJ!=g' );
define( 'NONCE_SALT',       '7EtjgF{*)g/QAt3QQy1cDrPNU*#4D*WZCa_J;UJf]wwwY{$RJ`j*iu,=EgOJ,Zo`' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'cv24_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
