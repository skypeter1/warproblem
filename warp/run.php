<?php
require_once "../LiteTestPHP/LiteTestPHP.php";
$runner = new TestRunnerHTML();
require_once dirname(__FILE__) . "/tests/TestCaseInyector.php";
require_once dirname(__FILE__) . "/tests/TestCaseReactor.php";
$runner -> add_test_case(new TestCaseInyector());
$runner -> add_test_case(new TestCaseReactor());
$runner -> run();
?>

<html>
	<title>Entorno de Pruebas</title>
<head>
	<link href="style.css" rel="stylesheet" />
</head>
<body><?php echo $runner->get_output() ?></body>
</html>