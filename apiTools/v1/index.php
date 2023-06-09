<?php

require 'flight/Flight.php';

require_once 'database/db_users.php';
require_once 'env/domain.php';

$sub_domain="";




Flight::route('GET /getCreatedGroups/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    


$sub_domaincon = new model_dom();
$sub_domaintools = $sub_domaincon->dom_tools();
$sub_domainmain = $sub_domaincon->dom_main();

    $response=  file_get_contents($sub_domaintools.'/lugmatools/apiTools/v1/getCreatedGroups/'.$id);
   
  $response1= file_get_contents($sub_domainmain.'/lugmamain/apiUsers/v1/getByProfile/'.$id);
 
 

   $deco1=json_decode($response,true);
   $deco2=json_decode($response1,true);  
   // Crear el array combinado
$grupos = array(
  'groups' => $deco1['groups']
);
$usuarios = array(
  'users' => $deco2['users']
);
$res = array(
  
  'groups' => $grupos['groups'],
  'users' => $usuarios['users']
  
);
$arr = array_merge($grupos, $usuarios);

$groups = $arr['groups'];
$users = $arr['users'];

$r1 = [];
$result = [];

foreach ($users as $user) {
    $profile = $user['profile'];

    // Buscar los grupos con el mismo perfil
    $matchingGroups = [];
    foreach ($groups as $group) {
        if ($group['profile'] === $profile) {
            $matchingGroups[] = $group;
        }
    }

    // Combinar los datos del usuario con cada grupo
    foreach ($matchingGroups as $group) {
        $combinedData = array_merge($group, $user);
        $result[] = $combinedData;
        array_push($r1, $combinedData);
    }
}

echo json_encode(['group_constructor' => $r1]);



//echo json_encode($profile);
//echo json_encode($arr);
});

Flight::route('GET /getPublicGroups/', function () {
  header("Access-Control-Allow-Origin: *");

  $sub_domaincon = new model_dom();
$sub_domaintools = $sub_domaincon->dom_tools();
$sub_domainmain = $sub_domaincon->dom_main();
  $response=  file_get_contents($sub_domaintools.'/lugmatools/apiTools/v1/getPublicGroups/');
 
$response1= file_get_contents($sub_domainmain.'/lugmamain/apiUsers/v1/getAll/');



 $deco1=json_decode($response,true);
 $deco2=json_decode($response1,true);  
 // Crear el array combinado
$grupos = array(
'groups' => $deco1['groups']
);
$usuarios = array(
'users' => $deco2['users']
);
$res = array(

'groups' => $grupos['groups'],
'users' => $usuarios['users']

);
$arr= array_merge($grupos,$usuarios);



$groups = $arr['groups'];
$users = $arr['users'];

$r1 = [];
$result = [];

foreach ($users as $user) {
    $profile = $user['profile_id'];

    // Buscar los grupos con el mismo perfil
    $matchingGroups = [];
    foreach ($groups as $group) {
        if ($group['profile'] === $profile) {
            $matchingGroups[] = $group;
        }
    }

    // Combinar los datos del usuario con cada grupo
    foreach ($matchingGroups as $group) {
        $combinedData = array_merge($group, $user);
        $result[] = $combinedData;
        array_push($r1, $combinedData);
    }
}

echo json_encode(['group_constructor' => $r1]);


//echo json_encode($profile);
//echo json_encode($arr);
});



Flight::route('GET /getGroupById/@id/@profile', function ($id,$profile) {
  header("Access-Control-Allow-Origin: *");

  $sub_domaincon = new model_dom();
$sub_domaintools = $sub_domaincon->dom_tools();
$sub_domainmain = $sub_domaincon->dom_main();
  $response=  file_get_contents($sub_domaintools.'/lugmatools/apiTools/v1/getGroupById/'.$id);
 
$response1= file_get_contents($sub_domainmain.'/lugmamain/apiUsers/v1/getAll/');



 $deco1=json_decode($response,true);
 $deco2=json_decode($response1,true);  
 // Crear el array combinado
$grupos = array(
'groups' => $deco1['groups']
);
$usuarios = array(
'users' => $deco2['users']
);
$res = array(

'groups' => $grupos['groups'],
'users' => $usuarios['users']

);
$arr= array_merge($grupos,$usuarios);


$groups = $arr['groups'];
$users = $arr['users'];

$r1 = [];
$result = [];

foreach ($users as $user) {
    $profile = $user['profile_id'];

    // Buscar los grupos con el mismo perfil
    $matchingGroups = [];
    foreach ($groups as $group) {
        if ($group['profile'] === $profile) {
            $matchingGroups[] = $group;
        }
    }

    // Combinar los datos del usuario con cada grupo
    foreach ($matchingGroups as $group) {
        $combinedData = array_merge($group, $user);
        $result[] = $combinedData;
        array_push($r1, $combinedData);
    }
}

echo json_encode(['group_constructor' => $r1]);

});

Flight::route('GET /getAdminGroupById/@id/', function ($id) {
  header("Access-Control-Allow-Origin: *");

  $sub_domaincon = new model_dom();
$sub_domaintools = $sub_domaincon->dom_tools();
$sub_domainmain = $sub_domaincon->dom_main();
  $response=  file_get_contents($sub_domaintools.'/lugmatools/apiTools/v1/getAdminGroupById/'.$id);
 
$response1= file_get_contents($sub_domainmain.'/lugmamain/apiUsers/v1/getAll/');



 $deco1=json_decode($response,true);
 $deco2=json_decode($response1,true);  
 // Crear el array combinado
$grupos = array(
'groups' => $deco1['groups']
);
$usuarios = array(
'users' => $deco2['users']
);
$res = array(

'groups' => $grupos['groups'],
'users' => $usuarios['users']

);
$arr= array_merge($grupos,$usuarios);


$groups = $arr['groups'];
$users = $arr['users'];

$r1 = [];
$result = [];

foreach ($users as $user) {
    $profile = $user['profile_id'];

    // Buscar los grupos con el mismo perfil
    $matchingGroups = [];
    foreach ($groups as $group) {
        if ($group['profile'] === $profile) {
            $matchingGroups[] = $group;
        }
    }

    // Combinar los datos del usuario con cada grupo
    foreach ($matchingGroups as $group) {
        $combinedData = array_merge($group, $user);
        $result[] = $combinedData;
        array_push($r1, $combinedData);
    }
}

echo json_encode(['group_constructor' => $r1]);

});


Flight::route('GET /getGeneralGroupById/@id/', function ($id) {
  header("Access-Control-Allow-Origin: *");

  $sub_domaincon = new model_dom();
$sub_domaintools = $sub_domaincon->dom_tools();
$sub_domainmain = $sub_domaincon->dom_main();

  $response=  file_get_contents($sub_domaintools.'/lugmatools/apiTools/v1/getGeneralGroupById/'.$id);
 
$response1= file_get_contents($sub_domainmain.'/lugmamain/apiUsers/v1/getAll/');



 $deco1=json_decode($response,true);
 $deco2=json_decode($response1,true);  
 // Crear el array combinado
$grupos = array(
'groups' => $deco1['groups']
);
$usuarios = array(
'users' => $deco2['users']
);
$res = array(

'groups' => $grupos['groups'],
'users' => $usuarios['users']

);
$arr= array_merge($grupos,$usuarios);



$groups = $arr['groups'];
$users = $arr['users'];




$result = [];

foreach ($users as $group) {
    $profile = $group['profile'];

    // Buscar el usuario con el mismo perfil
    $matchingUser = null;
    foreach ($groups as $user) {
        if ($user['profile'] === $profile) {
            $matchingUser = $user;
            break;
        }
    }

    // Combinar los datos del grupo y el usuario
    if ($matchingUser) {
        $combinedData = array_merge($group, $matchingUser);
        $result[] = $combinedData;
    }
}

// Imprimir el resultado


echo json_encode(['group_constructor'=>$result]);
//echo json_encode($profile);
//echo json_encode($arr);

});




Flight::route('GET /getGroupInfo/@id/', function ($id) {
  header("Access-Control-Allow-Origin: *");

  $sub_domaincon = new model_dom();
$sub_domaintools = $sub_domaincon->dom_tools();
$sub_domainmain = $sub_domaincon->dom_main();
  $response=  file_get_contents($sub_domaintools.'/lugmatools/apiTools/v1/getGroupInfo/'.$id);
 
$response1= file_get_contents($sub_domainmain.'/lugmamain/apiUsers/v1/getAll/');



 $deco1=json_decode($response,true);
 $deco2=json_decode($response1,true);  
 // Crear el array combinado
$grupos = array(
'groups' => $deco1['groups']
);
$usuarios = array(
'users' => $deco2['users']
);
$res = array(

'groups' => $grupos['groups'],
'users' => $usuarios['users']

);
$arr= array_merge($grupos,$usuarios);



$groups = $arr['groups'];
$users = $arr['users'];

$r1 = [];
$result = [];

foreach ($users as $user) {
    $profile = $user['profile_id'];

    // Buscar los grupos con el mismo perfil
    $matchingGroups = [];
    foreach ($groups as $group) {
        if ($group['profile'] === $profile) {
            $matchingGroups[] = $group;
        }
    }

    // Combinar los datos del usuario con cada grupo
    foreach ($matchingGroups as $group) {
        $combinedData = array_merge($group, $user);
        $result[] = $combinedData;
        array_push($r1, $combinedData);
    }
}

echo json_encode(['group_constructor' => $r1]);


//echo json_encode($profile);
//echo json_encode($arr);


});


Flight::route('GET /getParticipantGroups/@id', function ($id) {
  header("Access-Control-Allow-Origin: *");

  $sub_domaincon = new model_dom();
$sub_domaintools = $sub_domaincon->dom_tools();
$sub_domainmain = $sub_domaincon->dom_main();
  $response=  file_get_contents($sub_domaintools.'/lugmatools/apiTools/v1/getParticipantGroups/'.$id);
 
$response1= file_get_contents($sub_domainmain.'/lugmamain/apiUsers/v1/getAll/');



 $deco1=json_decode($response,true);
 $deco2=json_decode($response1,true);  
 // Crear el array combinado
$grupos = array(
'groups' => $deco1['groups']
);
$usuarios = array(
'users' => $deco2['users']
);
$res = array(

'groups' => $grupos['groups'],
'users' => $usuarios['users']

);
$arr= array_merge($grupos,$usuarios);



$groups = $arr['groups'];
$users = $arr['users'];

$r1 = [];
$result = [];

foreach ($users as $user) {
    $profile = $user['profile_id'];

    // Buscar los grupos con el mismo perfil
    $matchingGroups = [];
    foreach ($groups as $group) {
        if ($group['profile'] === $profile) {
            $matchingGroups[] = $group;
        }
    }

    // Combinar los datos del usuario con cada grupo
    foreach ($matchingGroups as $group) {
        $combinedData = array_merge($group, $user);
        $result[] = $combinedData;
        array_push($r1, $combinedData);
    }
}

echo json_encode(['group_constructor' => $r1]);


//echo json_encode($profile);
//echo json_encode($arr);


});


Flight::route('GET /getResponsibleGroups/@id', function ($id) {
  header("Access-Control-Allow-Origin: *");

  $sub_domaincon = new model_dom();
$sub_domaintools = $sub_domaincon->dom_tools();
$sub_domainmain = $sub_domaincon->dom_main();
  $response=  file_get_contents($sub_domaintools.'/lugmatools/apiTools/v1/getResponsibleGroups/'.$id);
 
$response1= file_get_contents($sub_domainmain.'/lugmamain/apiUsers/v1/getAll/');



 $deco1=json_decode($response,true);
 $deco2=json_decode($response1,true);  
 // Crear el array combinado
$grupos = array(
'groups' => $deco1['groups']
);
$usuarios = array(
'users' => $deco2['users']
);
$res = array(

'groups' => $grupos['groups'],
'users' => $usuarios['users']

);
$arr= array_merge($grupos,$usuarios);



$groups = $arr['groups'];
$users = $arr['users'];

$r1 = [];
$result = [];

foreach ($users as $user) {
    $profile = $user['profile_id'];

    // Buscar los grupos con el mismo perfil
    $matchingGroups = [];
    foreach ($groups as $group) {
        if ($group['profile'] === $profile) {
            $matchingGroups[] = $group;
        }
    }

    // Combinar los datos del usuario con cada grupo
    foreach ($matchingGroups as $group) {
        $combinedData = array_merge($group, $user);
        $result[] = $combinedData;
        array_push($r1, $combinedData);
    }
}

echo json_encode(['group_constructor' => $r1]);


//echo json_encode($profile);
//echo json_encode($arr);

});


Flight::route('GET /getSubResponsibleGroups/@id', function ($id) {
  header("Access-Control-Allow-Origin: *");

  $sub_domaincon = new model_dom();
$sub_domaintools = $sub_domaincon->dom_tools();
$sub_domainmain = $sub_domaincon->dom_main();
  $response=  file_get_contents($sub_domaintools.'/lugmatools/apiTools/v1/getSubResponsibleGroups/'.$id);
 
$response1= file_get_contents($sub_domainmain.'/lugmamain/apiUsers/v1/getAll/');



 $deco1=json_decode($response,true);
 $deco2=json_decode($response1,true);  
 // Crear el array combinado
$grupos = array(
'groups' => $deco1['groups']
);
$usuarios = array(
'users' => $deco2['users']
);
$res = array(

'groups' => $grupos['groups'],
'users' => $usuarios['users']

);
$arr= array_merge($grupos,$usuarios);



$groups = $arr['groups'];
$users = $arr['users'];

$r1 = [];
$result = [];

foreach ($users as $user) {
    $profile = $user['profile_id'];

    // Buscar los grupos con el mismo perfil
    $matchingGroups = [];
    foreach ($groups as $group) {
        if ($group['profile'] === $profile) {
            $matchingGroups[] = $group;
        }
    }

    // Combinar los datos del usuario con cada grupo
    foreach ($matchingGroups as $group) {
        $combinedData = array_merge($group, $user);
        $result[] = $combinedData;
        array_push($r1, $combinedData);
    }
}

echo json_encode(['group_constructor' => $r1]);


//echo json_encode($profile);
//echo json_encode($arr);


});



Flight::route('GET /getUserGroups/@id', function ($id) {
  header("Access-Control-Allow-Origin: *");

  $sub_domaincon = new model_dom();
$sub_domaintools = $sub_domaincon->dom_tools();
$sub_domainmain = $sub_domaincon->dom_main();
  $response=  file_get_contents($sub_domaintools.'/lugmatools/apiTools/v1/getUserGroups/'.$id);
 
$response1= file_get_contents($sub_domainmain.'/lugmamain/apiUsers/v1/getAll/');



 $deco1=json_decode($response,true);
 $deco2=json_decode($response1,true);  
 // Crear el array combinado
$grupos = array(
'groups' => $deco1['groups']
);
$usuarios = array(
'users' => $deco2['users']
);
$res = array(

'groups' => $grupos['groups'],
'users' => $usuarios['users']

);
$arr= array_merge($grupos,$usuarios);



$groups = $arr['groups'];
$users = $arr['users'];

$r1 = [];
$result = [];

foreach ($users as $user) {
    $profile = $user['profile_id'];

    // Buscar los grupos con el mismo perfil
    $matchingGroups = [];
    foreach ($groups as $group) {
        if ($group['profile'] === $profile) {
            $matchingGroups[] = $group;
        }
    }

    // Combinar los datos del usuario con cada grupo
    foreach ($matchingGroups as $group) {
        $combinedData = array_merge($group, $user);
        $result[] = $combinedData;
        array_push($r1, $combinedData);
    }
}

echo json_encode(['group_constructor' => $r1]);


//echo json_encode($profile);
//echo json_encode($arr);

  
 

});


Flight::route('GET /getModerGroupById/@id/@profile', function ($id,$profile) {
  header("Access-Control-Allow-Origin: *");

  $sub_domaincon = new model_dom();
$sub_domaintools = $sub_domaincon->dom_tools();
$sub_domainmain = $sub_domaincon->dom_main();
  $response=  file_get_contents($sub_domaintools.'/lugmatools/apiTools/v1/getModerGroupById/'.$id.'/'.$profile);
 
$response1= file_get_contents($sub_domainmain.'/lugmamain/apiUsers/v1/getAll/');



 $deco1=json_decode($response,true);
 $deco2=json_decode($response1,true);  
 // Crear el array combinado
$grupos = array(
'groups' => $deco1['groups']
);
$usuarios = array(
'users' => $deco2['users']
);
$res = array(

'groups' => $grupos['groups'],
'users' => $usuarios['users']

);
$arr= array_merge($grupos,$usuarios);



$groups = $arr['groups'];
$users = $arr['users'];

$r1 = [];
$result = [];

foreach ($users as $user) {
    $profile = $user['profile_id'];

    // Buscar los grupos con el mismo perfil
    $matchingGroups = [];
    foreach ($groups as $group) {
        if ($group['profile'] === $profile) {
            $matchingGroups[] = $group;
        }
    }

    // Combinar los datos del usuario con cada grupo
    foreach ($matchingGroups as $group) {
        $combinedData = array_merge($group, $user);
        $result[] = $combinedData;
        array_push($r1, $combinedData);
    }
}

echo json_encode(['group_constructor' => $r1]);


//echo json_encode($profile);
//echo json_encode($arr);

  
 

});

Flight::start();
