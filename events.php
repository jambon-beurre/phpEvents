<?php

	include ("Begin.php");
	
	$bdd = Connect_db();

?>
	<h1>Liste des évenements</h1>
	<form action="events.php" method="post">
		<label>Type</label> 
		<select name="Type">
           <option value="0">-</option>
		   <?php
				$query = $bdd->prepare('SELECT idType, Nom
										FROM Type');
				$query->execute(); 
				while ($line = $query->fetch())
				{
					if (isset($_POST['Type']) && $_POST['Type'] == $line['idType'])
						$selected = 'selected';
					else
						$selected = '';
					echo'<option value="'.$line['idType'].'" '. $selected .'>'.$line['Nom'].'</option>';
				}
			?>
       </select>
	   <label>Trier par</label> 
		<select name="Order">
           <option value="0" <?php if (isset($_POST['Order']) && $_POST['Order'] == 0) echo 'selected'; ?> >Id</option>
		   <option value="1" <?php if (isset($_POST['Order']) && $_POST['Order'] == 1) echo 'selected'; ?> >Nom</option>
		   <option value="2" <?php if (isset($_POST['Order']) && $_POST['Order'] == 2) echo 'selected'; ?> >Type</option>
		   <option value="3" <?php if (isset($_POST['Order']) && $_POST['Order'] == 3) echo 'selected'; ?> >Lieu</option>
       </select>
	   <button type="submit">Filtrer</button>
	</form>
	<br/>
	<table>
		<thead> 
			<tr>
				<th>Id</th><th>Nom</th><th>Type</th><th>Lieu</th> 
			</tr>
		</thead>
		<tbody>
	
<?php
	
	$SQL_Query = '	SELECT idEvent, Event.Nom eNom, Type.Nom tNom, Lieu 
					FROM Event JOIN Type ON Event.idType = Type.idType ';
	
	if (isset($_POST['Type']) && $_POST['Type'] != 0)
		$SQL_Query .= 'WHERE Type.idType = '.intval($_POST['Type']). ' ';
	
	if (isset($_POST['Order']) && $_POST['Order'] == 0)
		$SQL_Query .= 'ORDER BY idEvent';
	else if (isset($_POST['Order']) && $_POST['Order'] == 1)
		$SQL_Query .= 'ORDER BY eNom';
	else if (isset($_POST['Order']) && $_POST['Order'] == 2)
		$SQL_Query .= 'ORDER BY tNom';
	else if (isset($_POST['Order']) && $_POST['Order'] == 3)
		$SQL_Query .= 'ORDER BY Lieu';
	 
	$query = $bdd->prepare($SQL_Query);
	$query->execute(); 
	while ($line = $query->fetch())
	{
		echo'<tr>
				<td>'.$line['idEvent'].'</td><td><a href="EventDescr.php?idEvent='.$line['idEvent'].'">'.$line['eNom'].'</a></td><td>'.$line['tNom'].'</td><td>'.$line['Lieu'].'</td> 
			</tr>
			';
	}
?>
		</tbody>
	</table>
	
<?php
	include ("End.php");
?>
