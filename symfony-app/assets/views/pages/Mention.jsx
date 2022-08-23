import React from 'react'
import FeedLine from "../components/feed/FeedLine";
import Layout from "../components/Layout/Layout";
import Dot from "../components/dot/Dot";
import wave from "../../images/wave.svg";
import "../../styles/blog.scss";

function Mention() {
    return (
        <Layout>
            <div className={"blog"}>
                <div className="header">
                    <div className="bg-blue">
                        <FeedLine title="mentions-légales"/>
                        <h1 className="pageTitle pb-3">
                            Mentions Légales
                            <Dot color="white"/>
                        </h1>
                    </div>
                </div>
                <div className="wave">
                    <img id={"wave"} src={wave} alt="wave"/>
                </div>
                <div className="container-fluid d-flex justify-content-center row mb-5 mx-auto p-0 position-relative" data-aos="fade-up"
                     data-aos-duration="2000">
                    <p>
                        Merci de lire avec attention les différentes modalités d’utilisation du présent site avant d’y
                        parcourir ses pages. En vous connectant sur ce site, vous acceptez, sans réserves, les présentes
                        modalités.
                        <br/>
                        Aussi, conformément à l’article n°6 de la Loi n°2004-575 du 21 Juin 2004 pour la confiance dans
                        l’économie numérique, les responsables du présent site internet www.anthedesign.fr sont :
                    </p>

                    <h4>Éditeurs du Site :</h4>

                    <p>Le Collectif Deviteasy est composé des 3 auto-entrepreneurs suivant :</p>

                    <ul className={'mention-list'}>
                        <li>
                            <h5>Chariault Mael</h5>
                            <p>
                                Numéro de SIRET : 91185610200015
                                <br/>
                                214 rue des déportés 45590 St Cyr en Val
                                <br/>
                                Téléphone: 0608613088
                                <br/>
                                Email : mael.chariault@deviteasy.fr
                            </p>
                        </li>
                        <li>
                            <h5>Houry Tennessee</h5>
                            <p>
                                Numéro de SIRET : 91171112500011
                                <br/>
                                667 rue Saint-Michel 45470 Loury
                                <br/>
                                Téléphone: 0761793355
                                <br/>
                                Email : tennessee.houry@deviteasy.fr
                            </p>
                        </li>
                        <li>
                            <h5>Pinguet Loïc</h5>
                            <p>
                                Numéro de SIRET : 91176794500015
                                <br/>
                                3 rue du grand clos 45170 Chilleurs-aux-Bois
                                <br/>
                                Téléphone: 0766886671
                                <br/>
                                Email : loic.pinguet@deviteasy.fr
                            </p>
                        </li>
                    </ul>

                    <h4>Hébergeur :</h4>

                    <p>
                        Le site internet www.deviteasy.fr est hébergé par la société O2switch.
                    </p>

                    <h4>
                        Conditions d’utilisation :
                    </h4>

                    <p>
                        Ce site (www.deviteasy.fr) est composé de différents langages web (HTML, HTML5, Javascript, CSS,
                        etc…) pour un meilleur confort d’utilisation et un graphisme plus agréable.
                        <br/>
                        Nous vous recommandons de recourir à des navigateurs modernes comme Safari, Firefox, Google
                        Chrome, etc…
                        <br/>
                        Le collectif deviteasy met en œuvre tous les moyens dont il dispose, pour assurer une
                        information fiable et une mise à jour fiable de son sites internet.
                        <br/>
                        Toutefois, des erreurs ou omissions peuvent survenir. L’internaute devra donc s’assurer de
                        l’exactitude des informations auprès de deviteasy , et signaler toutes modifications du site
                        qu’il
                        jugerait utile. Deviteasy n’est en aucun cas responsable de l’utilisation faite de ces
                        informations, et de tout préjudice direct ou indirect pouvant en découler.
                    </p>

                    <h4>Cookies :</h4>

                    <p>
                        Le site www.deviteasy.fr peut-être amené à vous demander l’acceptation des cookies pour
                        des besoins de statistiques et d’affichage. Un cookie est une information déposée sur votre
                        disque
                        dur par le serveur du site que vous visitez.
                        <br/>
                        Il contient plusieurs données qui sont stockées sur votre ordinateur dans un simple fichier
                        texte
                        auquel un serveur accède pour lire et enregistrer des informations. Certaines parties de ce site
                        ne
                        peuvent être fonctionnelles sans l’acceptation de cookies.
                    </p>

                    <h4>Liens hypertextes : </h4>

                    <p>
                        Le site internet deviteasy.fr peut offrir des liens vers d’autres sites internet ou
                        d’autres ressources disponibles sur Internet. Deviteasy ne dispose d’aucun moyen pour
                        contrôler les sites en connexion avec ses sites internet.
                        <br/>
                        Deviteasy ne répond pas de la disponibilité de tels sites et sources externes, ni ne la
                        garantit.
                        Elle ne peut être tenue pour responsable de tout dommage, de quelque nature que ce soit,
                        résultant
                        du contenu de ces sites ou sources externes, et notamment des informations, produits ou services
                        qu’ils proposent, ou de tout usage qui peut être fait de ces éléments. Les risques liés à cette
                        utilisation incombent pleinement à l’internaute, qui doit se conformer à leurs conditions
                        d’utilisation.
                        <br/>
                        Les utilisateurs, les abonnés et les visiteurs des sites internet ne peuvent pas mettre en place
                        un
                        hyperlien en direction de ce site sans l’autorisation expresse et préalable de Deviteasy.
                        <br/>
                        Dans l’hypothèse où un utilisateur ou visiteur souhaiterait mettre en place un hyperlien en
                        direction du site internet Deviteasy.fr, il lui appartiendra d’adresser un email
                        accessible sur le site afin de formuler sa demande de mise en place d’un hyperlien.
                        <br/>
                        Deviteasy se réserve le droit d’accepter ou de refuser un hyperlien sans avoir à en
                        justifier sa décision.
                    </p>

                    <h4>Services fournis :</h4>

                    <p>
                        L’ensemble des activités du collectif ainsi que ses informations sont présentés sur notre site
                        www.deviteasy.fr.
                        <br/>
                        le collectif Deviteasy s’efforce de fournir sur le site www.deviteasy.fr des informations aussi
                        précises que possible. Les renseignements figurant sur le site www.deviteasy.fr ne sont pas
                        exhaustifs et les photos non contractuelles.
                        <br/>
                        Ils sont donnés sous réserve de modifications ayant été apportées depuis leur mise en ligne. Par
                        ailleurs, tous les informations indiquées sur le site www.deviteasy.fr sont données à titre
                        indicatif, et sont susceptibles de changer ou d’évoluer sans préavis.
                    </p>

                    <h4>Limitations contractuelles sur les données :</h4>

                    <p>
                        Les informations contenues sur ce site sont aussi précises que possible et le site remis à jour
                        à différentes périodes de l’année, mais peut toutefois contenir des inexactitudes ou des
                        omissions.
                        <br/>
                        Si vous constatez une lacune, erreur ou ce qui parait être un dysfonctionnement, merci de bien
                        vouloir le signaler par courriel, à l’adresse contact@deviteasy.fr, en décrivant le problème
                        de la manière la plus précise possible (page posant problème, type d’ordinateur et de navigateur
                        utilisé, …).
                        <br/>
                        Tout contenu téléchargé se fait aux risques et périls de l’utilisateur et sous sa seule
                        responsabilité. En conséquence, ne saurait être tenu responsable d’un quelconque dommage subi
                        par l’ordinateur de l’utilisateur ou d’une quelconque perte de données consécutives au
                        téléchargement.
                        <br/>
                        De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne
                        contenant pas de virus et avec un navigateur de dernière génération mis-à-jour.
                        <br />
                        Les liens hypertextes mis en place dans le cadre du présent site internet en direction d’autres ressources présentes sur le réseau Internet ne sauraient engager la responsabilité des membres du collectif Deviteasy.
                    </p>

                    <h4>Propriété intellectuelle :</h4>

                    <p>
                        Tout le contenu du présent site www.deviteasy.fr, incluant, de façon non limitative, les graphismes, images, textes, vidéos, animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive du collectif à l’exception des marques, logos ou contenus appartenant à d’autres sociétés partenaires ou auteurs.
                        <br/>
                        Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l’accord exprès par écrit des membres du collectif Deviteasy. Cette représentation ou reproduction, par quelque procédé que ce soit, constitue une contrefaçon sanctionnée par les articles L.335-2 et suivants du Code de la propriété intellectuelle. Le non-respect de cette interdiction constitue une contrefaçon pouvant engager la responsabilité civile et pénale du contrefacteur. En outre, les propriétaires des Contenus copiés pourraient intenter une action en justice à votre encontre.
                    </p>

                    <h4>Litiges :</h4>

                    <p>
                        Les présentes conditions du site www.deviteasy.fr sont régies par les lois françaises et toute contestation ou litiges qui pourraient naître de l’interprétation ou de l’exécution de celles-ci seront de la compétence exclusive des tribunaux dont dépend le siège social de la société. La langue de référence, pour le règlement de contentieux éventuels, est le français.
                    </p>

                    <h4>Données personnelles :</h4>

                    <p>
                        De manière générale, vous n’êtes pas tenu de nous communiquer vos données personnelles lorsque vous visitez notre site Internet www.deviteasy.fr.
                        <br/>
                        Cependant, ce principe comporte certaines exceptions. En effet, pour certains services proposés par notre site, vous pouvez être amenés à nous communiquer certaines données telles que : votre nom, votre adresse électronique.
                        <br/>
                        Tel est le cas lorsque vous remplissez le formulaire qui vous est proposé en ligne, dans la rubrique « contact ».
                        <br/>
                        Dans tous les cas, vous pouvez refuser de fournir vos données personnelles. Dans ce cas, vous ne pourrez pas utiliser les services du site, notamment celui de solliciter des renseignements sur notre société.
                        <br/>
                        Enfin, nous pouvons collecter de manière automatique certaines informations vous concernant lors d’une simple navigation sur notre site internet, notamment : des informations concernant l’utilisation de notre site, comme les zones que vous visitez et les services auxquels vous accédez, votre adresse IP, le type de votre navigateur, vos temps d’accès.
                        <br/>
                        De telles informations sont utilisées exclusivement à des fins de statistiques internes, de manière à améliorer la qualité des services qui vous sont proposés. Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.
                    </p>
                </div>
            </div>
        </Layout>
);
}

export default Mention;
