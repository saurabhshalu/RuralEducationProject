<?php

	require_once 'connect.php';

	if(isset($_POST['qry']))
	{
		switch ($_POST['qry']) {
			case 'secureLogin':
				# code...

				if(!isset($_SESSION['loggedIn']))
				{	
					$email = $_POST['email'];
					$password = $_POST['password'];
					$type = $_POST['type'];

					$query = null;

					if($type=='teacher')
						$query = $handler->query("select * from tblteacher where email='" . $email . "' and password='" . $password . "' limit 1");
					else
						$query = $handler->query("select * from tbllearner where email='" . $email . "' and password='" . $password . "' limit 1");

					$result = $query->fetchAll();


					if(count($result)==1)
					{
						$_SESSION['loggedIn'] = 1;
						$_SESSION['name'] = $result[0]['name'];
						$_SESSION['currentUser'] = $email;
						$_SESSION['rating'] = $result[0]['rating'];
						$_SESSION['eventcount'] = $result[0]['eventcount'];
						$_SESSION['pincode'] = $result[0]['pincode'];
						$_SESSION['userType'] = $type;
						exit("success");
					}
					else
					{
						unset($_SESSION['loggedIn']);
						exit("No user found!");
					}
				}

				break;

			case 'secureRegister':

				$email = $_POST['email'];
				$password = $_POST['password'];
				$number = $_POST['number'];
				$name = $_POST['name'];
				$state = $_POST['state'];
				$pincode = $_POST['pincode'];
				$district = $_POST['district'];
				$type = $_POST['type'];
				$rating = 0;
				$eventcount = 0;

				$query = null;


				if($type=='teacher')
					$query = $handler->query("select * from tblteacher where email='" . $email . "'");
				else
					$query = $handler->query("select * from tbllearner where email='" . $email . "'");

				$result = $query->fetchAll();

				if(count($result)>0)
					exit("Email id already exist!");
				else
				{
					$query = $handler->query("select * from tblcitylist where pincode='" . $pincode . "'");
					$result = $query->fetchAll();

					if(count($result)!=0)
					{
						$pincode = $result[0][1];
						$district = $result[0][2];
						$state = $result[0][3];
					}
					else
					{
						$sql = "INSERT INTO tblcitylist (pincode, district, state) VALUES (:pincode, :district, :state)";
						$query = $handler->prepare($sql);

						$query->execute(array(
							':pincode'=>$pincode,
							':district'=>$district,
							':state'=>$state
						));
					}

					if($type=='teacher')
					{
						$sql = "INSERT INTO tblteacher (password, name, email, pincode, phone, rating, eventcount) VALUES (:password, :name, :email, :pincode, :phone, :rating, :eventcount)";
						$query = $handler->prepare($sql);

						$query->execute(array(
							':password'=>$password,
							':name'=>$name,
							':email'=>$email,
							':pincode'=>$pincode,
							':phone'=>$number,
							':rating'=>$rating,
							':eventcount'=>$eventcount
						));
					}
					else
					{
						$sql = "INSERT INTO tbllearner (password, email, pincode, name, phone) VALUES (:password, :email, :pincode, :name, :phone)";
						$query = $handler->prepare($sql);

						$query->execute(array(
							':password'=>$password,
							':email'=>$email,
							':pincode'=>$pincode,
							':name'=>$name,
							':phone'=>$number
						));

					}
					

					if($query)
					{
						$_SESSION['loggedIn'] = 1;
						$_SESSION['name'] = $_POST['name'];
						$_SESSION['currentUser'] = $email;
						$_SESSION['rating'] = $_POST['rating'];
						$_SESSION['eventcount'] = $_POST['eventcount'];
						$_SESSION['pincode'] = $pincode;
						$_SESSION['userType'] = $type;
						exit("success");
					}
					else
					{
						unset($_SESSION['loggedIn']);
						exit("error");
					}
				}
				
				exit();
				break;

			case 'submitInterest':

				$teacher_id = $_SESSION['currentUser'];
				$subject = $_POST['subject'];
				$district = $_POST['location'];
				$status = $_POST['status'];

				$query = $handler->query("select * from tblcitylist where district='" . $district . "' limit 1");
				$result = $query->fetchAll();

				$pincode = $result[0]['pincode'];

				$query = $handler->query("select * from tbl_interestedteachers where subject='" . $subject . "' and pincode='" . $pincode . "' and status=0");
				$result = $query->fetchAll();

				if(count($result)>0)
				{
					exit("Selected subject is already requested, Please select different subject!");
				}

				$query = $handler->query("select * from tbleventlist where subject='" . $subject . "' and location='" . $pincode . "' and teacher_id='" . $_SESSION['currentUser'] . "' and status=1");
				$result = $query->fetchAll();

				if(count($result)>0)
					exit("Live session is going on for this subject in selected area! Please select different subject or location!");


				$sql = "INSERT INTO tbl_interestedteachers (teacher_id, subject, pincode, status, requestedBy) VALUES (:teacher_id, :subject, :pincode, :status, :requestedBy)";
				$query = $handler->prepare($sql);

				$query->execute(array(
					':teacher_id'=>$teacher_id,
					':subject'=>$subject,
					':pincode'=>$pincode,
					':status'=>0,
					':requestedBy'=>null
				));

				if($query)
				{
					exit("Request added successfully!");
				}
				else
				{
					exit("Opps! Something bad happend, please contact administrator!");
				}

				exit();
				break;

			case 'submitNeeds':
				$subject = $_POST['subject'];
				$status = $_POST['status'];
				$pincode = $_SESSION['pincode'];

				$query = $handler->query("select * from tbl_neededteachers where subject='" . $subject . "' and pincode='" . $pincode . "' and status=0");
				$result = $query->fetchAll();

				if(count($result)>0)
					exit("Selected subject is already requested, Please select different subject!");

				$query = $handler->query("select * from tbleventlist where subject='" . $subject . "' and location='" . $pincode . "' and learner_id='" . $_SESSION['currentUser'] . "' and status=1");
				$result = $query->fetchAll();

				if(count($result)>0)
					exit("Live session is going on for this subject in your area! Please select different subject!");
				

				$sql = "INSERT INTO tbl_neededteachers (learner_id, subject, pincode, status) VALUES (:learner_id, :subject, :pincode, :status)";
				$query = $handler->prepare($sql);

				$query->execute(array(
					':learner_id'=>$_SESSION['currentUser'],
					':subject'=>$subject,
					':pincode'=>$pincode,
					':status'=>$status
				));

				if($query)
				{
					exit("Request added successfully!");
				}
				else
				{
					exit("Opps! Something bad happend, please contact administrator!");
				}
				exit();
				break;

			case 'approveFromNeededTeacher':
				$id = $_POST['id'];
				$whatToDo = $_POST['whatToDo'];

				if($whatToDo=='rejectRequest')
				{
					$sql = "UPDATE tbl_interestedteachers SET requestedBy=? WHERE id=?";
					$query= $handler->prepare($sql);
					$query->execute([null, $id]);

					if($query)
						exit("success");
					else
						exit("error");

				}
				else if($whatToDo == "approveRequest")
				{
					$query = $handler->query("select * from tbl_interestedteachers where id='" . $id . "' and status=0");
					$result = $query->fetchAll();

					$teacher_id = $_SESSION['currentUser'];
					$subject = $result[0][2];
					$pincode = $result[0][3];
					$learner_id = $result[0][5];

					$query = $handler->query("select * from tbl_neededteachers where subject='" . $subject . "' and pincode='". $pincode . "' and status=0");
					$result = $query->fetchAll();

					if(count($result)>0)
					{
						$needID = $result[0][0];
						$sql = "UPDATE tbl_neededteachers SET status=1 WHERE id=?";
						$query= $handler->prepare($sql);
						$query->execute([$needID]);
					}
					
					$sql = "UPDATE tbl_interestedteachers SET status=1 WHERE id=?";
					$query= $handler->prepare($sql);
					$query->execute([$id]);

					$sql = "INSERT INTO tbleventlist (mydate, learner_id, subject, teacher_id, location, status) VALUES (:mydate, :learner_id, :subject, :teacher_id, :location, :status)";
					$query = $handler->prepare($sql);

					$query->execute(array(
						':mydate'=>date('Y/m/d'),
						':learner_id'=>$learner_id,
						':subject'=>$subject,
						':teacher_id'=>$teacher_id,
						':location'=>$pincode,
						':status'=>1
					));

					if($query)
						exit("success");
					else
						exit("error");

				}
				else
				{

					$query = $handler->query("select * from tbl_neededteachers where id='" . $id . "' and status=0");
					$result = $query->fetchAll();

					$teacher_id = $_SESSION['currentUser'];
					$subject = $result[0][2];
					$pincode = $result[0][3];
					$learner_id = $result[0][1];

					$query = $handler->query("select * from tbl_interestedteachers where subject='" . $subject . "' and pincode='". $pincode . "' and  status=0 and requestedBy='" . $learner_id . "'");
					$result = $query->fetchAll();

					if(count($result)>0)
					{
						$interestID = $result[0][0];
						$sql = "UPDATE tbl_interestedteachers SET status=1 WHERE id=?";
						$query= $handler->prepare($sql);
						$query->execute([$interestID]);
					}

					$sql = "UPDATE tbl_neededteachers SET status=1 WHERE id=?";
					$query= $handler->prepare($sql);
					$query->execute([$id]);



					$sql = "INSERT INTO tbleventlist (mydate, learner_id, subject, teacher_id, location, status) VALUES (:mydate, :learner_id, :subject, :teacher_id, :location, :status)";
					$query = $handler->prepare($sql);

					$query->execute(array(
						':mydate'=>date('Y/m/d'),
						':learner_id'=>$learner_id,
						':subject'=>$subject,
						':teacher_id'=>$teacher_id,
						':location'=>$pincode,
						':status'=>1
					));

					if($query)
						exit("success");
					else
						exit("error");
				}

				break;

			case 'requestToInterestedTeacher':
				$id = $_POST['id'];
				$whatToDo = $_POST['whatToDo'];

				$val = $_SESSION['currentUser'];
				if($whatToDo=="Delete")
					$val = null;
				
				$sql = "UPDATE tbl_interestedteachers SET requestedBy=? WHERE id=?";
				$query= $handler->prepare($sql);
				$query->execute([$val, $id]);


				if($query)
					exit("success");
				else
					exit("error");


				exit();
				break;

			default:
				# code...
				break;
		}
	}
?>