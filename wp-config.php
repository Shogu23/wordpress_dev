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
define( 'DB_NAME', 'wordpress_dev' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'charles' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '4321' );

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
define( 'AUTH_KEY',         '2D|JY(J4k>uOk_[EJ=4kZZ?bhH6M^Nv>~gzB),7SVIW[bBD*eTT] -+aN$mlFxkO' );
define( 'SECURE_AUTH_KEY',  '|D-v43vi/$m-oTLjMvJ9AZNPkM&0?cbZDsYXF7[L6!@.Ju _1y>Ii7=f0`_76cq_' );
define( 'LOGGED_IN_KEY',    '&k2hePJQKk0>uVXH6=xC@p0&GL.24~~-|eiM=vH[cUpPTj_l#B!LSkDG+]y+Es>O' );
define( 'NONCE_KEY',        'l(o$TdMN{NBI~zG{>[:-Xo xg7a2l} 9~RRt:;ro}NDI>oaF}5S+5&U8FL&a!FP/' );
define( 'AUTH_SALT',        '?$Dj8WJ9yKK&ic<:Eq(d?VX(1}0{<X%9?en#rM*aVOM8QduzcL>w;p]Fsz3A@A`1' );
define( 'SECURE_AUTH_SALT', '5{Ze_]k5R7X^QfejITy19@#1%.;Xl.PwG|0eg~[qf/dQJFuJf*vHD<kmb8jc;.L2' );
define( 'LOGGED_IN_SALT',   '~e8Fqx46dn7yBHK>_kSO<:Aj<s2YlQwi/|#AUb&s$z3J)+P!*lEh]:9#@E4r[5<)' );
define( 'NONCE_SALT',       'D1_9p6hMhZz!58rz&`Ed$Rd:y1#Hp`3ObG(OKD.tlE~Jf|X(j*bY}lI,`8W h0si' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'brouette_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
