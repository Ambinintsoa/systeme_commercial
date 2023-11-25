<?php defined('BASEPATH') OR exit('No direct script access allowed');

class BandcommandeController extends CI_controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Back_office/achat/Bandcommande');
    }

    public function validateCommande(){
        $idcommande = $this -> input -> post('commande');
        $this -> Bandcommande -> lastvalidation($idcommande, 1);
        redirect(base_url().'back_office/BandcommandeController/commandes');
    }

    // ADJOINT
    public function getBandCommande(){
        $user = $this->session->userdata('user_data'); 
        if($user['privilege']==2){
            // $boncommandes = $this->Bandcommande->getBoncommandesOnceValid();
        //     // var_dump($boncommandes);
        //     for($i=0;$i< count($boncommandes) ; $i++){
        //         $data['bandcommandes'][] =  $this->Bandcommande-> bandcommande($boncommandes[$i]['idglobal']);
        //         $data['global'][] = $boncommandes[$i];
        //     }
        //     // var_dump( $data['global']);
        //    $data['content'] = 'back_office/achat/bandcommande';
        //    $this->load->view('back_office/main',$data);

                $boncommandes = $this->Bandcommande->getBoncommandesOnceValid();
                // var_dump($boncommandes);
                for($i=0;$i< count($boncommandes) ; $i++){
                    // echo $boncommandes[$i]['idboncommande'];
                    $data['commandes'][]=  $this->Bandcommande-> getCommandesComplete($boncommandes[$i]['idboncommande']);
                    $data['commande'][]= $boncommandes[$i];
                    $data['global'][] = $boncommandes[$i];
                }
                // var_dump( $data['commandes']);
                // var_dump($boncommandes);
            $data['content'] = 'back_office/achat/commande_finance';
           $this->load->view('back_office/main',$data);
        } else{
            redirect(base_url().'back_office/BandcommandeController/commandes');
        }  
    }

    // FINNACE
    public function getBandCommandeFinance(){
        $boncommandes = $this->Bandcommande->getBoncommandesNonValid();
        // var_dump($boncommandes);
        for($i=0;$i< count($boncommandes) ; $i++){
            $data['bandcommandes'][] =  $this->Bandcommande-> bandcommande($boncommandes[$i]['idglobal']);
            $data['global'][] = $boncommandes[$i];
        }
        // var_dump( $data['global']);
        $data['content'] = 'back_office/achat/bandcommande';
        $this->load->view('back_office/main',$data);
    }


    public function sendMail(){
        $global = $this->input->post("global[]");
        $count = $this->input->post("count");
        var_dump($global);
        echo $count;
        for($i = 0 ; $i < count($global); $i++){
        $this->Bandcommande->updatestatus($global[$i]);
        }
    }
    public function verificationcommande(){
        $data['boncommandes'] =  $this->Bandcommande-> bandcommande();
        $data['content'] = 'back_office/achat/validationcommande';
        $this->load->view('back_office/main',$data);
    }

public function createBoncommande() {
        $idglobal =$this->input->post("global");
    $this->Bandcommande->createBoncommande($idglobal) ;
    redirect(base_url().'back_office/BandcommandeController/getBandCommande');
}
public function commandes(){
    $boncommandes = $this->Bandcommande->getCommandes();
    // var_dump($boncommandes);
    for($i=0;$i< count($boncommandes) ; $i++){
        echo $boncommandes[$i]['idboncommande'];
        $data['commandes'][]=  $this->Bandcommande-> getCommandesComplete($boncommandes[$i]['idboncommande']);
        $data['commande'][]= $boncommandes[$i];
    }
    // var_dump( $data['commandes']);
   $data['content'] = 'back_office/achat/commande';
   $this->load->view('back_office/main',$data);
    
}

public function commandesOnce(){
    $boncommandes = $this->Bandcommande->getBoncommandesOnceValid();
    // var_dump($boncommandes);
    for($i=0;$i< count($boncommandes) ; $i++){
        echo $boncommandes[$i]['idboncommande'];
        $data['commandes'][]=  $this->Bandcommande-> getCommandesComplete($boncommandes[$i]['idboncommande']);
        $data['commande'][]= $boncommandes[$i];
    }
    // var_dump( $data['commandes']);
   $data['content'] = 'back_office/achat/commande_finance';
   $this->load->view('back_office/main',$data);
    
}


public function send($idcommande){
    $this->Bandcommande->validate($idcommande,1);
    redirect(base_url().'back_office/BandcommandeController/commandes');
}

}

?>