<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/application/modules/addressBook.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/application/modules/viewer.php');

set_time_limit(0);

try{
    $addressBook = new AddressBook();
    while(true){
        $timestamp = isset($_GET['timestamp'])?(int)$_GET['timestamp']:null;
        clearstatcache();

        if($timestamp == null || $addressBook->getTimestamp() > $timestamp ){
            clearstatcache();
            switch($_SERVER['REQUEST_METHOD']){
                case 'GET':

                    if(isset($_GET['act']) && $_GET['act'] == 'ajax'){
                        header('Content-Type: application/json');
                        echo json_encode(array(
                            'data'      => $addressBook->get(),
                            'timestamp' => $addressBook->getTimestamp()
                            ));
                    }
                    else
                        Viewer::view('contacts');

                    break;
                case 'PUT':
                    $data = file_get_contents('php://input');
                    $addressBook->create(new Contact($data['id'], $data['name'], $data['phone']));
                    break;
                case 'DELETE':
                    $data = file_get_contents('php://input');
                    $addressBook->delete(new Contact($data['id'], $data['name'], $data['phone']));
                    break;
                default:
                    header('HTTP/1.1 405 Unsupported method');
                    header('Allow: GET, PUT, DELETE');
                    break;
            }

            break;

        }else{
            sleep(1);
            continue;
        }
    }

}catch ( Exception $e){
    //logging
    header('HTTP/1.1 Internal Server Error');
}