
          <div class="form-group">
              <label for="unite_admission">Unite d'admission</label>
              <select class="form-control" name="unite_admission">
            @foreach($unite_admissions as $unite_admission)
            <option class ="text text-primary"> {{$unite_admission->nom_unite_admission}} </option>
            
            @endforeach
            
             </select>
          </div>

          <div class="form-group">
              <label for="etat_patient">Etat du patient</label>
              <input type="text" class="form-control" name="etat_patient"/>
          </div>

          <div class="form-group">
              <label for="diagnostic_accueil">diagnostic accueil</label>
              <input type="text" class="form-control" name="diagnostic_accueil"/>
          </div>

            <div class="form-group">
              <label for="diagnostic_sortie">diagnostic sortie</label>
              <input type="text" class="form-control" name="diagnostic_sortie"/>
             </div>
          

             <div class="form-group">
              <label for="chambre_patient">chambre patient</label>
              <input type="text" class="form-control" name="chambre_patient"/>
             </div>



             <div class="form-group">
              <label for="lit_patient">lit patient</label>
              <input type="text" class="form-control" name="lit_patient"/>
            </div>


            <div class="form-group">
              <label for="categorie_patient">categorie_patient</label>
              <input type="text" class="form-control" name="categorie_patient"/>
            </div>

            <div class="form-group">
              <label for="date_hospitalisation">date hospitalisation</label>
              <input type="date" class="form-control" name="date_hospitalisation"/>
            </div>

            <div class="form-group">
              <label for="decision_sortie">Decision de sortie </label>
              <input type="text" class="form-control" name="decision_sortie"/>
            </div>

            <div class="form-group">
              <label for="date_sortie"> Date de sortie </label>
              <input type="date" class="form-control" name="date_sortie"/>
            </div>

