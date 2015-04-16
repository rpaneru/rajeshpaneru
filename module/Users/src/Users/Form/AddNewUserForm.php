<?php
namespace Users\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

use Zend\Db\Sql\Sql;

class AddNewUserForm extends Form implements InputFilterProviderInterface 
{       
    protected $sm;
    protected $dbAdapter;
    
    public function __construct($sm , $dbAdapter)
    {   
        $this->sm = $sm;
        $this->dbAdapter = $dbAdapter;        
        
        parent::__construct('addNewUserForm');

        $this-> setAttribute('method','post');
        $this->setAttribute('action', '');


        $this->add(array(
            'name' => 'name',
            'type' => 'Text',
            'attributes' => array(                                                            
                            'id' => 'name',
                            'class' => 'form-control',
                            //'required' => 'true',
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
               'name' => 'dob',
               'type' => 'Text',
               'attributes' => array(
                   'type' => 'text',
                   'class' => 'form-control',
                   //'required' => 'true',
                   'id' => 'dob',
                    'placeholder' => 'Date Of Birth'
               ),
                'options' => array(
                       'label' => 'DOB'
              )
           ));
                
            $this->add(array(
                'name' => 'gender',
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
                'name' => 'mobile',
                'type' => 'Text',
                'attributes' => array(                                                     
                                'id' => 'mobile',
                                'class' => 'form-control',
                                //'required' => 'true',
                                'placeholder' => 'Mobile'
                            ),
                'options' => array(
                                'label' => 'Mobile'
                            )
            ));
                        
            $this->add(array(
                'name' => 'fax',
                'type' => 'Text',
                'attributes' => array(                                                     
                                'id' => 'fax',
                                'class' => 'form-control',
                                'placeholder' => 'Fax'
                            ),
                'options' => array(
                                'label' => 'Fax'
                            )
            ));
                                    
            $this->add(array(
                'name' => 'email',
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
                'name' => 'password',
                'type' => 'password',
                'attributes' => array(                                                     
                                'id' => 'password',
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
                    'name' => 'user_image',
                    'type' => 'file',
                    'attributes' => array(
                        'id' => 'user_image',
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
                'name' => 'status',
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
                        '1' => 'Active',
                        '2' => 'Inactive'
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
           'name' => 'state',
           'type' => 'Select',
           'attributes' => array(
                    'id' => 'state',            
                    'class' => 'form-control'
                ),
                'options' => array(
                    'label' => 'State',
                    'empty_option' => 'Select State',
                    'value_options' => $this->getOptionsForStates()
                )
       ));
           
           $this->add(array(                           
           'name' => 'country',
           'type' => 'Select',
           'attributes' => array(
                    'id' => 'country',            
                    'class' => 'form-control'
                ),
                'options' => array(
                    'label' => 'Country',
                    'empty_option' => 'Select Country',
                    'value_options' => $this->getOptionsForCountries()
                )
       ));
       
        $this->add(array(
            'name' => 'zip',
            'type' => 'text',
            'attributes' => array(               
               'id' => 'zip',
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
            
            'name' => array(
                'required' => 'true',
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'message' => 'Please select name'
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
            $indianStatesArray[$rowObject->id] = $rowObject->name;
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
            $countriesArray[$rowObject->id] = $rowObject->name;
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
