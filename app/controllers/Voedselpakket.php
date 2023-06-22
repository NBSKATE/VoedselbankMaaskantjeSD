<?php

class Voedselpakket extends Controller
{
	private $voedselpakketModel;

	public function __construct()
	{
		// We create an instance of the model class and assign it to $voedselpakketModel
		$this->voedselpakketModel = $this->model('VoedselpakketModel');
	}
	

	public function index()
	{
		$records = $this->voedselpakketModel->getVoedselpakket();


		$rows = '';

		foreach ($records as $item) {
			// checkt als het de vertegenwoordiger op 1 staat zoja geeft hij de volledige naam
			$name = $item->Voornaam;
			if ($item->Tussenvoegsel) {
				$name .= ' ' . $item->Tussenvoegsel;
			}
			$name .= ' ' . $item->Achternaam;
			// checkt als het de vertegenwoordiger op 1 staat zoja geeft hij de volledige naam
			$IsVertegenwoordiger = ($item->IsVertegenwoordiger == 1) ? $name : '';

			$rows .= "<tr>
						<td>$item->Naam</td>
						<td>$item->Omschrijving</td>
						<td>$item->AantalVolwassenen</td>
						<td>$item->Aantalkinderen</td>
						<td>$item->Aantalbabys</td>
						<td>$IsVertegenwoordiger</td>
						<td>
						<!-- haalt img van een database op en laat de img zien +clickable link -->
						<a href=\"<?= URLROOT; ?>/voedselpakket/details/$item->IsVertegenwoordiger\">
						<img src=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAA/VJREFUSEvFll9oW3UUxz/n3s7aNolMLY62STsYbqLgEGQPClNBEEEffJjKWHVt2gruZd2o61ZcKu3qSq1/ULBNUpjIkOmDQ/RFUPcggqgoKEIfZpvUIjjB5SY62+Yeud1NepvcJu380zz9cu7vdz7nnN/3d34/YZN+sklcrhkcSWbuVVua09HAOUR0owlsGNw8mbnVNHgZ5GEX9r1tcGiuI3hhI/B1g7dNWY3XKUMonYBZDpEP87bd+3N3aHo9AVQFt5zTOsPK9qH0AfWu00WBUWescBSode02QmJBGPilI/hrpQDWBqtKJJlrBz0FNHmcfGFS8+RP0bpZxxZO5prEzo8gcgCKmvlDYETMwNjMQbniF4AvuGXK2mvYvA7c4bMoD0wtGJzwZtUat25DdFyRhzxr5kAGUp0Nb5UKcBXYRziIckGVZzF5AGUQ2Oo6zooymr8hMDa3T/4swNygXwF2ewIoE2ARHJ7M3S2G/eXKZJlR7MPpaOj9gq35TOYmc0lOoXR7nM6DHF+VlbNNidx+FR0WiHh8Pp2KBs44/4vgSNyKIZz0gkUYmO1oOFtapu3J7J22MqHoHt+sYmpEWnIHFH1hFVgZTHUFY1XAV10qfGcovbNdwU9K9zuSyD4F+iKwzfPtPMJOlF1l+qgGFhhWOAJcv7JYPxKVo7NdwR+9DpsmtH6LmT2u8BxQUwKzUMaLlawGTkWDsj2evSUvOgR0AIbr0GmNSRXjZLqzYd6xNU1kbq4x5HmEZ4Atnq36wDAX22cObv09krCuttT1gAsO2iYyu2zTGAV9xJPNX6K8ZAu2KEcQ6iqV9ZrAK8fk8h7TNl8tEZSHp19hGP3Y+nFpdv8IXCC0xq3HVHC62U5XndMKA6nOwHuO+v0g/wrYgbXFrfts4VNnbCj3z3QFPysE5kIsRdsLPeB/AbcmrCExl8YcUZUEU11coMca88Hxr3tksUw0VTL2zt/xmtYu1FmHERlZU9XhuPW4CO94Fl5U1d50V+h8KbxSqVdrQcZAt3vW70tFg++62lgxt01md9uGOrfSPQVr4ZJIdQd/KB6xSns8ad0uwhsq7PUAPzdsOTTTHfi26NevlOFk5lFRcS76ZeUCtnMVLuW1f74ndMkv4+VGYi6XtNhwBKZt1T6/qq39EIhpTbgl221ATKHRDSADOoxhfFM8r4Y8iG3fBXICCLnzLgkMzs4F3iQmS37JVX367Hj7t9DCldpjoL2eJ07GA/GOF0HGavILpy/23HjZD1ix1P7lzzWJ5k+D7Pdep+5cRTm7ZJr98x316UrADYOLwioXYJlw/hNwwWk4YT3hjNPRoPcIroe5PKfqHq/b0wYnbhr4b/Xx7i7zCRijAAAAAElFTkSuQmCC
						width=\"50\" height=\"50\" alt=\"Voedselpakket\">
						</a>
						</td>
					</tr>";
}

$data = [
'title' => "Overzicht voedselpakketten",
'rows' => $rows
];
$this->view('voedselpakket/index', $data);
}

public function gezinnen()
{
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$eetwensId = $_POST['eetwens'];

// Haal de gezinnen op met de geselecteerde eetwens
$gezinnen = $this->voedselpakketModel->getGezinnenByEetwens($eetwensId);

if (!empty($gezinnen)) {
// Toon de gezinnen
$rows = '';
foreach ($gezinnen as $gezin) {
$rows .= "<tr>
    <td>$gezin->Naam</td>
    <td>$gezin->Omschrijving</td>
    <td>$gezin->AantalVolwassenen</td>
    <td>$gezin->Aantalkinderen</td>
    <td>$gezin->Aantalbabys</td>
    <td>$gezin->Voornaam $gezin->Tussenvoegsel $gezin->Achternaam</td>
    <td>
        <a href=\"<?= URLROOT; ?>/voedselpakket/details/$gezin->Id\" class=\"btn
            btn-primary\">Voedselpakket Details</a>
    </td>
</tr>";
}

$data = [
'title' => "Overzicht voedselpakketten",
'rows' => $rows
];
$this->view('voedselpakket/index', $data);
} else {
// Geen gezinnen met de geselecteerde eetwens gevonden
$data = [
'title' => "Overzicht voedselpakketten",
'message' => "Er zijn geen gezinnen bekend die de geselecteerde eetwens hebben."
];
$this->view('voedselpakket/no-gezinnen', $data);
}
}
}}