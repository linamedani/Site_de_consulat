<?php



class Controller_visa extends Controller
{
    public function action_default()
    {
        $this->action_submit();
    }

    public function action_submit()
    {
        // Initialiser le tableau des erreurs
        $errors = [];
    
        // Vérifiez si le formulaire a été soumis en méthode POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Normalisation et récupération des données du formulaire
            $normalize = function($str) {
                return strtolower(str_replace(['é', 'è', 'ê', 'ç', 'ï'], ['e', 'e', 'e', 'c', 'i'], $str));
            };
    
            $nationalites = [
                "visa_requis" => array_map($normalize, [
                    "Allemagne", "Maroc", "Andorre", "Argentine", "Australie", "Autriche", 
                    "Belgique", "Bosnie", "Brésil", "Bulgarie", "Canada", "Chine", "Chypre", 
                    "Croatie", "Danemark", "Espagne", "États-Unis", "France", "Grèce", "Hongrie", 
                    "Inde", "Irlande", "Italie", "Japon", "Mexique", "Norvège", "Pays-Bas", 
                    "Pologne", "Portugal", "Royaume-Uni", "Russie", "Suisse", "Suède", "Turquie"
                ]),
                "exempt" => array_map($normalize, ["Tunisie", "Libye", "Mauritanie", "SaharaOccidental", "Mali", "Égypte"]),
                "interdit" => array_map($normalize, ["Israël"])
            ];
            
    
            // Récupération des données du formulaire
            $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
            $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
            $nationalite = isset($_POST['nationalite']) ? $normalize($_POST['nationalite']) : '';
            $numero_passeport = isset($_POST['numero_passeport']) ? $_POST['numero_passeport'] : '';
            $date_creation = isset($_POST['date_creation']) ? $_POST['date_creation'] : '';
            $date_validite = isset($_POST['date_validite']) ? $_POST['date_validite'] : '';
    
            // Vérification des erreurs de validation
            if (!empty($nationalite)) {
                if (in_array($nationalite, $nationalites['interdit'])) {
                    $errors[] = "Désolé, vous ne pouvez pas demander de visa pour l'Algérie avec cette nationalité.";
                } elseif (in_array($nationalite, $nationalites['exempt'])) {
                    $errors[] = "Votre nationalité est exemptée de visa pour l'Algérie.";
                } elseif (!in_array($nationalite, array_merge($nationalites['visa_requis'], $nationalites['exempt'], $nationalites['interdit']))) {
                    $errors[] = "Votre nationalité ne figure pas dans notre liste pour une demande de visa.";
                }
            }
    
            if ($dob && strtotime($dob) > time()) {
                $errors[] = "La date de naissance ne peut pas être dans le futur.";
            }
    
            if ($date_creation && strtotime($date_creation) > time()) {
                $errors[] = "La date de création du passeport ne peut pas être dans le futur.";
            }
    
            $six_months_from_now = strtotime("+6 months");
            if ($date_validite && strtotime($date_validite) < $six_months_from_now) {
                $errors[] = "Le passeport doit être valide pour au moins 6 mois.";
            }
            if (isset($_FILES['passport_photo']) && $_FILES['passport_photo']['error'] === UPLOAD_ERR_OK) {
                $allowed_types = ['image/jpeg', 'image/png'];
                $file_type = mime_content_type($_FILES['passport_photo']['tmp_name']);
                
                if (!in_array($file_type, $allowed_types)) {
                    $errors[] = "Le fichier doit être une image JPG ou PNG.";
                } else {
                    // Déplacer le fichier téléchargé vers le dossier des uploads
                    $upload_dir = 'telechargements/';
                    $file_name = basename($_FILES['passport_photo']['name']);
                    $upload_path = $upload_dir . $file_name;
                    
                    if (!move_uploaded_file($_FILES['passport_photo']['tmp_name'], $upload_path)) {
                        $errors[] = "Erreur lors du téléchargement de l'image.";
                    }
                }
            } else {
                $errors[] = "Veuillez télécharger une image de votre passeport.";
            }
            
             // Validation des informations de carte bancaire
            $card_number = isset($_POST['card_number']) ? $_POST['card_number'] : '';
            $expiration_date = isset($_POST['expiration_date']) ? $_POST['expiration_date'] : '';
            $cvc = isset($_POST['cvc']) ? $_POST['cvc'] : '';

             if (!preg_match('/^\d{16}$/', $card_number)) {
                  $errors[] = "Le numéro de carte doit contenir 16 chiffres.";
            }

            $current_month = date('Y-m');
            if ($expiration_date < $current_month) {
                $errors[] = "La date d'expiration de la carte est invalide.";
            }

            if (!preg_match('/^\d{3}$/', $cvc)) {
                 $errors[] = "Le CVC doit être composé de 3 chiffres.";
            }

    
            // Si des erreurs sont présentes, on réaffiche le formulaire avec les erreurs
            if (!empty($errors)) {
                $this->render('visa', [
                    'errors' => $errors,
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'dob' => $dob,
                    'nationalite' => $nationalite,
                    'numero_passeport' => $numero_passeport,
                    'date_creation' => $date_creation,
                    'date_validite' => $date_validite
                ]);
                return; // Stop ici pour éviter de passer à la génération du PDF
            }
          
        
    
            // Création du PDF uniquement si tout est correct
        require('libs/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();

        // Ajouter un logo
        $pdf->Image('images/logo.png', 10, 8, 30);  
        $pdf->Ln(30);  // Décalage après le logo

        // Titre du PDF
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTextColor(62, 101, 77); // Vert Algérien
        $pdf->Cell(200, 10, 'Acceptation de Visa', 0, 1, 'C');
        
        // Séparer les sections avec des lignes
        $pdf->SetDrawColor(0, 0, 0);  // Couleur verte
        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
        $pdf->Ln(10);
        $pdf->SetTextColor(0,0, 0); 
  
        // Ajout des informations avec des espacements entre les lignes
$pdf->Cell(0, 10, "Nom: $nom", 0, 1);
$pdf->Ln(2); // Espace entre les lignes
$pdf->Cell(0, 10, "Prenom: $prenom", 0, 1);
$pdf->Ln(2);
$pdf->Cell(0, 10, "Date de naissance: $dob", 0, 1);
$pdf->Ln(2);
$pdf->Cell(0, 10, "Nationalite: $nationalite", 0, 1);
$pdf->Ln(2);
$pdf->Cell(0, 10, "Numero de passeport: $numero_passeport", 0, 1);
$pdf->Ln(2);
$pdf->Cell(0, 10, "Date de creation du passeport: $date_creation", 0, 1);
$pdf->Ln(2);
$pdf->Cell(0, 10, "Date de validite du passeport: $date_validite", 0, 1);

        // Ajouter une ligne pour séparer les informations
        $pdf->Ln(10);
        $pdf->SetDrawColor(0, 0, 0);  // Couleur verte
        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
        
        // Enregistrer le PDF sous un nom unique
        $filename = 'pdfs/demande_visa_' . time() . '.pdf';
        $pdf->Output('F', $filename);

        // Associer le PDF généré uniquement si le formulaire a été rempli correctement
        $_SESSION['pdf_visa'] = $filename;
            
    
            // Afficher le formulaire avec le message de confirmation et un lien de téléchargement
            $this->render('profil', [
                'confirmation_message' => "Votre demande a été traitée avec succès ! Cliquez sur le lien ci-dessous pour télécharger votre acceptation de visa.",
                'pdf_filename' => $filename,  // Le nom du fichier généré pour permettre le téléchargement
                'nom' => $nom,
                'prenom' => $prenom,
                'dob' => $dob,
                'nationalite' => $nationalite,
                'numero_passeport' => $numero_passeport,
                'date_creation' => $date_creation,
                'date_validite' => $date_validite
            ]);
            return; // Stop ici pour ne pas rediriger après l'affichage
        } else {
            // Afficher le formulaire par défaut si aucune soumission
            $this->render('visa');
        }
    }
    

}
?>


