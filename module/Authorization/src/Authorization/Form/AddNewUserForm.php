<?php
namespace Users\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Captcha;

use Zend\Db\Sql\Sql;


class AddNewUserForm extends Form implements InputFilterProviderInterface 
{       
    protected $sm;
    protected $dbAdapter;
    
    public function __construct($sm , $dbAdapter, $action)
    {   
        $this->sm = $sm;
        $this->dbAdapter = $dbAdapter;        
        
        parent::__construct('addNewUserForm');

        $this-> setAttribute('method','post');
        $this->setAttribute('action', $action);


        $this->add(array(
            'name' => 'userName',
            'type' => 'Text',
            'attributes' => array(                                                            
                            'id' => 'userName',
                            'class' => 'form-control',
                            'required' => 'true',
                            'placeholder' => 'Name'
                        ),
            'options' => array(
                            'label' => 'Name',
                            'label_attributes' => array(
                                'class'=> 'requiredLabel'
                            ),
                        )
        ));
            
        $this->add(array(
               'name' => 'userDob',
               'type' => 'Text',
               'attributes' => array(
                   'type' => 'text',
                   'class' => 'form-control',
                   //'required' => 'true',
                   'id' => 'userDob',
                    'placeholder' => 'Date Of Birth'
               ),
                'options' => array(
                       'label' => 'DOB'
              )
           ));
                
            $this->add(array(
                'name' => 'userGender',
                'type' => 'Radio',
                'attributes' => array(
                    //'required' => 'true',
                    'value' => 'Male'
                ),
                'options' => array(
                    'label' => 'Gender',                    
                    'value_options' => array(
                        'Male' => 'Male',
                        'Female' => 'Female'
                    )
                )
            ));

            $this->add(array(
                'name' => 'userMobile',
                'type' => 'Text',
                'attributes' => array(                                                     
                                'id' => 'userMobile',
                                'class' => 'form-control',
                                //'required' => 'true',
                                'placeholder' => 'Mobile'
                            ),
                'options' => array(
                                'label' => 'Mobile'
                            )
            ));
                        
            $this->add(array(
                'name' => 'userFax',
                'type' => 'Text',
                'attributes' => array(                                                     
                                'id' => 'userFax',
                                'class' => 'form-control',
                                'placeholder' => 'Fax'
                            ),
                'options' => array(
                                'label' => 'Fax'
                            )
            ));
                                    
            $this->add(array(
                'name' => 'userEmail',
                'type' => 'email',
                'attributes' => array(                                                                                      'id' => 'email',
                                'class' => 'form-control',
                                'required' => 'true',
                                'placeholder' => 'Email'
                            ),
                'options' => array(
                                'label' => 'Email',
                                'label_attributes' => array(
                                    'class'=> 'requiredLabel'
                                ),
                            )
            ));
                                                
            $this->add(array(
                'name' => 'userPassword',
                'type' => 'password',
                'attributes' => array(                                                     
                                'id' => 'userPassword',
                                'class' => 'form-control',
                                'required' => 'true',
                                'placeholder' => 'Password'
                            ),
                'options' => array(
                                'label' => 'Password',
                                'label_attributes' => array(
                                    'class'=> 'requiredLabel'
                                ),
                            )
            ));
                                                            
                                                            
       
                $this->add(array(
                    'name' => 'userImage',
                    'type' => 'file',
                    'attributes' => array(
                        'id' => 'userImage',
                        'class' => 'form-control'
                    ),
                     'options' => array(
                            'label' => 'Profile Picture',
                   )
                ));      
            
            
           $this->add(array(                           
           'name' => 'userTypeId',
           'type' => 'Select',
           'attributes' => array(
                    'required' => 'true',
                    'id' => 'userTypeId',            
                    'class' => 'form-control'
                ),
                'options' => array(
                    'label' => 'User Type',
                    'label_attributes' => array(
                            'class'=> 'requiredLabel'
                        ),
                    'empty_option' => 'Select User Type',
                    'value_options' => $this->getOptionsForUserTypes()
                )
       ));


            $this->add(array(
                'name' => 'userStatus',
                'type' => 'Radio',
                'attributes' => array(
                    'required' => 'true',
                    'value' => '1'
                ),
                'options' => array(
                    'label' => 'Status',
                    'label_attributes' => array(
                        'class'=> 'requiredLabel'
                    ),
                    'value_options' => array(
                        'Active' => 'Active',
                        'Inactive' => 'Inactive'
                    )
                )
            ));
           
           


	$this->add(array(
            'name' => 'address',
            'type' => 'text',
           'attributes' => array(             
               'id' => 'address',
               'class' => 'form-control',
               'placeholder' => 'Address'
            ),
            'options' => array(
                'label' => 'Address',
            )
       ));
        
        
       $this->add(array(
           'name' => 'city',
           'type' => 'text',
           'attributes' => array(               
               'id' => 'city',
               'class' => 'form-control',
               'placeholder' => 'City'
           ),
            'options' => array(
                   'label' => 'City',
          )
       )); 
       
            $this->add(array(
             'name' => 'district',
             'type' => 'Text',
             'attributes' => array(                                                 
                     'id' => 'district',
                     'class' => 'form-control',                     
                     'placeholder' => 'District'
                     ),
             'options' => array(
                             'label' => 'District'
                     )
         ));
       
           $this->add(array(                           
           'name' => 'stateId',
           'type' => 'Select',
           'attributes' => array(
                    'id' => 'stateId',            
                    'class' => 'form-control'
                ),
                'options' => array(
                    'label' => 'State',
                    'empty_option' => 'Select State',
                    'value_options' => $this->getOptionsForStates()
                )
       ));
           
           $this->add(array(                           
           'name' => 'countryId',
           'type' => 'Select',
           'attributes' => array(
                    'id' => 'countryId',            
                    'class' => 'form-control'
                ),
                'options' => array(
                    'label' => 'Country',
                    'empty_option' => 'Select Country',
                    'value_options' => $this->getOptionsForCountries()
                )
       ));
       
        $this->add(array(
            'name' => 'zipCode',
            'type' => 'text',
            'attributes' => array(               
               'id' => 'zipCode',
               'class' => 'form-control',                
               'placeholder' => 'Zip'
           ),
            'options' => array(
                   'label' => 'Zip',
          )
       )); 
               
           
        $this->add(array(
           'name' => 'term',           
            'type' => 'Checkbox',
           'attributes' => array(
               'required' => 'true',
               'type' => 'Checkbox',
               'id' => 'term'
           ),
            'options' => array(
                   'label' => 'Accept Term',
                    'label_attributes' => array(
                        'class'=> 'requiredLabel'
                    ),
          )
       ));
        
        $this-> add(array(
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => array(
                'id' => 'submit', 
                'class' => 'btn btn-primary',
                'value' => 'Add New User'
            )
            
        ));
                

    }
        
    public function getInputFilterSpecification() 
    {
        return array(
            
            'userName' => array(
                'required' => 'true',
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'message' => 'Please select name'
                        )
                    )
                )
            ),
            
            'userGender' => array(
                'required' => 'true',
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'message' => 'Please select gender'
                        )
                    )
                )
            )
            
        );
    }
    
    public function getOptionsForStates()
    {
        $sm = $this->sm;
        
        $indianStatesTable = $sm-> get('Application\Model\IndianStatesTable');        
        $indianStatesData = $indianStatesTable->getAllStates();
        
        $indianStatesArray = array();
        foreach ($indianStatesData as $rowObject) 
        {
            $indianStatesArray[$rowObject->id] = $rowObject->stateName;
        }
        return $indianStatesArray;
    }
    
    public function getOptionsForCountries()
    {
        $sm = $this->sm; 
        
        $countriesTable = $sm-> get('Application\Model\CountriesTable');        
        $countriesData = $countriesTable->getAllCountries();
        
        $countriesArray = array();        
        foreach ($countriesData as $rowObject) 
        {
            $countriesArray[$rowObject->id] = $rowObject->countryName;
        }
        return $countriesArray;        
    }
    
    public function getOptionsForUserTypes()
    {
        $sm = $this->sm; 
        
        $userTypesTable = $sm-> get('Users\Model\UserTypesTable');        
        $userTypesData = $userTypesTable->getAllUserTypes();
        
        $userTypesArray = array();        
        foreach ($userTypesData as $rowObject) 
        {
            $userTypesArray[$rowObject->id] = $rowObject->userType;
        }
        return $userTypesArray;
    }
    
}
