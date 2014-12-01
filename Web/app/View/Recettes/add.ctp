	<div class="container">
		<form role="form" action="#">
            <div id="recette">
                <legend>Recette</legend> 
                    <label id="persolabel" for="titre">Titre : </label> <input type="text" id="titre" name="titre" /><br>
                    <legend>Préparation</legend>
                <div id="prepa">
                    <label id="persolabel" for="aliments">Aliments :</label>
                        <select name="aliments">
                            <option selected="selected">Sélectionnez l'aliment</option>
                        </select>
                        <button onclick="NouvelAliment()" id="ajoutalim" class="btn btn-primary">+</button>
                        <button onclick="SupprimerAliment()" id="suppalim" class="btn btn-primary">x</button><br>
                    <label id="persolabel" for="qte">Quantité :</label>     <input type="number" id="qte" name="qte" /><br>
                </div>
            </div>
			<button id="addrecettes" class="btn btn-primary" type="submit">Ajouter la recette</button>
		</form>
	</div>
    <script type="text/javascript">
        function NouvelAliment(){
            $( "#prepa").append( "<div id=\"prepa1\"><label id=\"persolabel\" for=\"aliments\">Aliments :</label><select name=\"aliments\"><option selected=\"selected\">Sélectionnez l'aliment</option></select><br><label id=\"persolabel\" for=\"qte\">Quantité :</label><input type=\"number\" id=\"qte\" name=\"qte\" /></div><br>");
        }
        function SupprimerAliment(){
            $("#prepa1").remove();
        }
        $("#ajoutalim").click(function()
        {
            return false; //Empêche le formulaire d'être soumis
        });
        $("#suppalim").click(function()
        {
            return false; //Empêche le formulaire d'être soumis
        });
    </script>