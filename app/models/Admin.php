<?php 
class Admin{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
 
    
/////////////////////////////////// manager ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function findAllManager(){
    $this->db->query('SELECT * FROM manager');

    $results = $this->db->resultSet();

    return $results;
}


public function addManager($data){
    $this->db->query('INSERT INTO manager (admin_id, name, nic, contact, email, address, password, profile) VALUES (:admin_id, :name, :nic, :contact, :email, :address, :password, :profile)');

    //Bind values
    $this->db->bind('admin_id', $data['admin_id']);
    //$this->db->bind('manager_id', $data['manager_id']);
    $this->db->bind('name', $data['name']);
    $this->db->bind('nic', $data['nic']);
    $this->db->bind('contact', $data['contact']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('address', $data['address']);
    $this->db->bind('password', $data['password']);
    $this->db->bind('profile', $data['profile']);


     //execute the function
    if($this->db->execute()){
        return true;
    }else{
        return false;
    } 

}


/*------------------------ Update manager ----------------------------------------------------------------------------*/
    public function findManagerById($manager_id){
        $this->db->query('SELECT * FROM manager WHERE manager_id = :manager_id');

        $this->db->bind(':manager_id', $manager_id);

        $row = $this->db->single();
        return $row;
    }


    public function updateManager($data){
        $this->db->query('UPDATE manager SET name = :name, nic= :nic, contact=:contact, email = :email, address = :address, profile = :profile, password = :password WHERE manager_id= :manager_id');

        $this->db->bind(':manager_id', $data['manager_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':nic', $data['nic']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':contact', $data['contact']);
        $this->db->bind(':profile', $data['profile']);
        $this->db->bind(':password', $data['password']);

        //execute the function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        } 

    }


   /*----------------------- Delete Manager --------------------------------------------------------------------------------*/
        public function deleteManager($manager_id){
            $this->db->query('DELETE FROM manager WHERE manager_id = :manager_id');

            $this->db->bind(':manager_id', $manager_id);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }









/////////////////////////////////////////   FAQ      ////////////////////////////////////////////////////////////////////////////////////////
public function findAllQuestions(){
    $this->db->query('SELECT * FROM faq');

    $results = $this->db->resultSet();

    return $results;
}


/*--------------------------- Add FAQ ----------------------------------------------------------------------------------------------------*/
    public function addFAQ($data){
        $this->db->query('INSERT INTO faq (admin_id, question, answer) VALUES (:admin_id, :question, :answer)');

        //Bind values
        $this->db->bind(':admin_id', $data['admin_id']);
        $this->db->bind(':question', $data['question']);
        $this->db->bind(':answer', $data['answer']);


        //execute the function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        } 

    }



/*------------------------------ update faq ------------------------------------------------------------------------------------------------*/
    public function findFAQById($faq_id){
        $this->db->query('SELECT * FROM faq WHERE faq_id = :faq_id');

        //Bind values
        $this->db->bind(':faq_id', $faq_id);

        $row = $this->db->single();
        
        return $row;
    }


    public function updateFAQ($data){
        $this->db->query('UPDATE faq SET question = :question, answer = :answer WHERE faq_id = :faq_id');

        $this->db->bind(':faq_id', $data['faq_id']);
        $this->db->bind(':question', $data['question']);
        $this->db->bind(':answer', $data['answer']);

        //execute the function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

/*-------------------------- Delete faq --------------------------------------------------------------------*/
    public function deleteFAQ($faq_id){
        $this->db->query('DELETE FROM faq WHERE faq_id = :faq_id');

        $this->db->bind(':faq_id', $faq_id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }





    

//////////////   Category    ////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////// Display category in table ////////////////////////////////////////////////////////////////////////////////////////////
    public function findAllCategory(){
        $this->db->query('SELECT * FROM category ORDER BY add_date Desc');

        $results = $this->db->resultSet();

        return $results;
    }
    
    
//////////  Add category ///////////////////////////////////////////////////////////////////////////////////////////////////////
    public function addCategory($data){
        $this->db->query('INSERT INTO category (admin_id, category, logo) VALUES (:admin_id, :category, :logo)');

        $this->db->bind(':admin_id', $data['admin_id']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':logo', $data['logo']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }
    
    public function findCategoryById($cat_id){
        $this->db->query('SELECT * FROM category WHERE cat_id = :cat_id');

        //Bind values
        $this->db->bind(':cat_id', $cat_id);

        $row = $this->db->single();
        
        return $row;
    }



/*--------------------------- Update category ----------------------------------------------------------------------------------*/
public function updateCategory($data){

    $this->db->query('UPDATE category SET category = :category, logo = :logo  WHERE cat_id = :cat_id');

    $this->db->bind(':cat_id', $data['cat_id']);
    $this->db->bind(':category', $data['category']);
    $this->db->bind(':logo', $data['logo']);

    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }

}

/*-------------------------- Delete category --------------------------------------------------------------------*/
public function deleteCategory($cat_id){
    $this->db->query('DELETE FROM category WHERE cat_id = :cat_id');

    $this->db->bind(':cat_id', $cat_id);

    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}








///////////////////////////////////// Registered usesrs //////////////////////////////////////////////////////////////////////
    public function findAllComapny(){
        
        $this->db->query('SELECT * FROM company');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllCustomer(){
        
        $this->db->query('SELECT * FROM customer');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findAllWorker(){
        
        $this->db->query('SELECT * FROM worker');

        $results = $this->db->resultSet();

        return $results;
    }








    //////////////////////////////// Admin Profile //////////////////////////////////////////////////////////////////////////////////////////////////
 /*------------------------------------Edit Pofile details------------------------------------------------------------------------------------*/
 public function findAdminDetails(){
        $this->db->query("SELECT * FROM admin WHERE admin_id = '{$_SESSION['admin_id']}'");

        $results = $this->db->resultSet();
        
        return $results;
}


public function changeProfile($data){

    $this->db->query("UPDATE admin SET name = :name,  email = :email, prof_pic = :prof_pic  WHERE admin_id = '{$_SESSION['admin_id']}'");

    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':prof_pic', $data['prof_pic']);


 

    if($this->db->execute()){
        return true;
    }else {
        return false;
    }

}














    ////////////////////////////////// Admin Change Password////////////////////////////////////////////////////////////////////////////////////

    /*----------------- admin change password-----------------------------------------------------------------------------------------------------*/

    public function findAdminPassword(){
        $this->db->query("SELECT password FROM admin WHERE admin_id = '{$_SESSION['admin_id']}'");

        $results = $this->db->resultSet();
        
        return $results;
    }


    public function changePassword($data){

        $this->db->query("UPDATE admin SET password = :newpassword WHERE admin_id = '{$_SESSION['admin_id']}'");

        $this->db->bind(':newpassword', $data['new-password']);
     

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    
    }








    /////////////////////       Pending Ads     ///////////////////////////////////////////////////////////////////////////////////////////////////

    /*-------------------   Customer Ads  --------------------------------------------------------------------------------------------------------*/
    public function getAds(){

        $this->db->query('SELECT  customer_ads.*, customer.prof_pic, customer.fname, customer.lname FROM customer_ads INNER JOIN customer ON customer_ads.cus_id = customer.cus_id WHERE customer_ads.status = "Pending"');

        $results = $this->db->resultSet();
        
        return $results;

    }


    /*------------------------  company ads   ----------------------------------------------------------------------------------------------------------*/
    public function getAdsw(){

        $this->db->query('SELECT company_ads.*, company.prof_pic, company.com_name FROM company_ads INNER JOIN company ON company_ads.reg_no = company.reg_no WHERE company_ads.status = "Pending"');

        //$this->db->query('SELECT * FROM company_ads   WHERE status = "Pending"');
        //$this->db->query('SELECT company_ads.*, company.com_name FROM company_ads INNER JOIN company ON company_ads.reg_no = company.reg_no WHERE status = "Pending"');

        $results = $this->db->resultSet();
        
        return $results;

    }


    /*-------------------------  Accept Customer ads -------------------------------------------------------------------------------------------------------------------*/
    public function cusacceptAds($data){
        $this->db->query('UPDATE customer_ads SET status="accept" WHERE ads_id=:ads_id');

        $this->db->bind(':ads_id', $data['ads_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }





    /*---------------- Reject Customer Ads   --------------------------------------------------------------------------------------------------------------------------------*/
    public function rejectCusAds($data){
        $this->db->query('UPDATE company_ads SET status = "reject" WHERE ads_id = :ads_id');

        $this->db->bind(':ads_id', $data['ads_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }




    /*-------------------------  Accept Company ads -------------------------------------------------------------------------------------------------------------------*/
    public function comacceptAds($data){
        $this->db->query('UPDATE company_ads SET status = "accept" WHERE ads_id = :ads_id');

        $this->db->bind(':ads_id', $data['ads_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    
    /*---------------- Reject Company Ads   --------------------------------------------------------------------------------------------------------------------------------*/
    public function rejectComAds($data){
        $this->db->query('UPDATE company_ads SET status="reject" WHERE ads_id=:ads_id');

        $this->db->bind(':ads_id', $data['ads_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }










    /////////////////////    Dashboard        ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function viewManagerCount(){
        $this->db->query('SELECT COUNT(*) AS managerCount FROM manager');


        $results = $this->db->resultSet();
        
        return $results;
        
    }


    public function viewCategoryCount(){
        $this->db->query('SELECT COUNT(*) AS categoryCount FROM category');


        $results = $this->db->resultSet();
        
        return $results;
        
    }


    public function viewCustomerCount(){
        $this->db->query('SELECT COUNT(*) AS customerCount FROM customer');


        $results = $this->db->resultSet();
        
        return $results;
        
    }

    public function viewWorkerCount(){
        $this->db->query('SELECT COUNT(*) AS workerCount FROM worker');


        $results = $this->db->resultSet();
        
        return $results;
        
    }

    public function viewCompanyCount(){
        $this->db->query('SELECT COUNT(*) AS companyCount FROM company');


        $results = $this->db->resultSet();
        
        return $results;
        
    }

    public function viewCusPendingadsCount(){
        $this->db->query("SELECT COUNT(*) AS cusadsCount FROM customer_ads WHERE status= 'Pending'");


        $results = $this->db->resultSet();
        
        return $results;
        
    }


    public function viewComPendingadsCount(){
        $this->db->query("SELECT COUNT(*) AS comadsCount FROM company_ads WHERE status= 'Pending'");


        $results = $this->db->resultSet();
        
        return $results;
        
    }
    
}