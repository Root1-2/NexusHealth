<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Symptom Checker</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        input[type="checkbox"] {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center container-fluid">
        <div>
           <a href="../Homepage/index.php" ><img src="../logo/reglogo.png" alt="" style="width: 250px;"> </a>
            <div class="mt-3 p-3" style="width: 30rem; align-items-start;">
                <div class="px-3 py-1 rounded" style="background-color: #F2F6FD">
                    <h4 class="mt-3">Symptom Checker</h4>
                    <p>Select symptoms:</p>
                </div>

                <form class="ms-1 mt-3" id="symptomForm">
                    <div class="border rounded p-2" onclick="toggleCheckbox('fever')">
                        <input type="checkbox" id="feverCheckbox" name="symptom" value="Fever">
                        <label for="feverCheckbox" class="ms-2">Fever</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('cough')">
                        <input type="checkbox" id="coughCheckbox" name="symptom" value="Cough">
                        <label for="coughCheckbox" class="ms-2">Cough</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('headache')">
                        <input type="checkbox" id="headacheCheckbox" name="symptom" value="Headache">
                        <label for="headacheCheckbox" class="ms-2">Headache</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('soreThroat')">
                        <input type="checkbox" id="soreThroatCheckbox" name="symptom" value="Sore throat">
                        <label for="soreThroatCheckbox" class="ms-2">Sore throat</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('fatigue')">
                        <input type="checkbox" id="fatigueCheckbox" name="symptom" value="Fatigue">
                        <label for="fatigueCheckbox" class="ms-2">Fatigue</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('shortnessOfBreath')">
                        <input type="checkbox" id="shortnessOfBreathCheckbox" name="symptom"
                            value="Shortness of breath">
                        <label for="shortnessOfBreathCheckbox" class="ms-2">Shortness of breath</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('chestPain')">
                        <input type="checkbox" id="chestPainCheckbox" name="symptom" value="Chest pain">
                        <label for="chestPainCheckbox" class="ms-2">Chest pain</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('jointPain')">
                        <input type="checkbox" id="jointPainCheckbox" name="symptom" value="Joint pain">
                        <label for="jointPainCheckbox" class="ms-2">Joint pain</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('nausea')">
                        <input type="checkbox" id="nauseaCheckbox" name="symptom" value="Nausea">
                        <label for="nauseaCheckbox" class="ms-2">Nausea</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('vomiting')">
                        <input type="checkbox" id="vomitingCheckbox" name="symptom" value="Vomiting">
                        <label for="vomitingCheckbox" class="ms-2">Vomiting</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('diarrhea')">
                        <input type="checkbox" id="diarrheaCheckbox" name="symptom" value="Diarrhea">
                        <label for="diarrheaCheckbox" class="ms-2">Diarrhea</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('abdominalPain')">
                        <input type="checkbox" id="abdominalPainCheckbox" name="symptom" value="Abdominal pain">
                        <label for="abdominalPainCheckbox" class="ms-2">Abdominal pain</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('rash')">
                        <input type="checkbox" id="rashCheckbox" name="symptom" value="Rash">
                        <label for="rashCheckbox" class="ms-2">Rash</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('dizziness')">
                        <input type="checkbox" id="dizzinessCheckbox" name="symptom" value="Dizziness">
                        <label for="dizzinessCheckbox" class="ms-2">Dizziness</label>
                    </div>

                    <div class="border rounded p-2 mt-2" onclick="toggleCheckbox('difficultySwallowing')">
                        <input type="checkbox" id="difficultySwallowingCheckbox" name="symptom"
                            value="Difficulty swallowing">
                        <label for="difficultySwallowingCheckbox" class="ms-2">Difficulty swallowing</label>
                    </div>

                    <button class="mt-2" type="button" onclick="checkSymptoms()">Check</button>
                </form>

                <div id="result"></div>
            </div>

        </div>
        <script>
            function toggleCheckbox(id) {
                var checkbox = document.getElementById(id + 'Checkbox');
                checkbox.checked = !checkbox.checked;
            }

            function checkSymptoms() {
                const form = document.getElementById("symptomForm");
                const symptoms = form.querySelectorAll('input[name="symptom"]:checked');
                let result = "<p>Possible diseases:</p>";

                if (symptoms.length === 0) {
                    result += "<p>No symptoms selected</p>";
                } else {
                    // Logic to determine possible diseases based on selected symptoms
                    const diseases = [];

                    symptoms.forEach(symptom => {
                        switch (symptom.value) {
                            case "Fever":
                                diseases.push("Tuberculosis");
                                diseases.push("Japanese encephalitis");
                                diseases.push("Pneumonia");
                                diseases.push("Rabies");
                                diseases.push("Anthrax");
                                diseases.push("Avian influenza");
                                diseases.push("Cholera");
                                diseases.push("Malaria");
                                diseases.push("Typhoid");
                                break;
                            case "Cough":
                                diseases.push("Tuberculosis");
                                diseases.push("Pneumonia");
                                diseases.push("Avian influenza");
                                diseases.push("Cholera");
                                diseases.push("Pneumonia");
                                diseases.push("Dysentery");
                                diseases.push("Leptospirosis");
                                break;
                            case "Headache":
                                diseases.push("Japanese encephalitis");
                                diseases.push("Meningitis");
                                diseases.push("Migraine");
                                break;
                            case "Sore throat":
                                diseases.push("Tuberculosis");
                                diseases.push("Strep throat");
                                diseases.push("Tonsillitis");
                                break;
                            case "Fatigue":
                                diseases.push("Anemia");
                                diseases.push("Chronic fatigue syndrome");
                                diseases.push("Neonatal sepsis");
                                break;
                            case "Shortness of breath":
                                diseases.push("Pneumonia");
                                diseases.push("Asthma");
                                diseases.push("Chronic obstructive pulmonary disease (COPD)");
                                diseases.push("Neonatal sepsis");
                                break;
                            case "Chest pain":
                                diseases.push("Heart diseases");
                                diseases.push("Pneumonia");
                                diseases.push("Stroke");
                                break;
                            case "Joint pain":
                                diseases.push("Rheumatoid arthritis");
                                diseases.push("Osteoarthritis");
                                break;
                            case "Nausea":
                                diseases.push("Neonatal sepsis");
                                diseases.push("Pneumonia");
                                diseases.push("Cholera");
                                diseases.push("Typhoid");
                                break;
                            case "Vomiting":
                                diseases.push("Neonatal sepsis");
                                diseases.push("Pneumonia");
                                diseases.push("Cholera");
                                diseases.push("Typhoid");
                                break;
                            case "Diarrhea":
                                diseases.push("Cholera");
                                diseases.push("Diarrhea");
                                diseases.push("Dysentery");
                                diseases.push("Leptospirosis");
                                break;
                            case "Abdominal pain":
                                diseases.push("Appendicitis");
                                diseases.push("Gastritis");
                                diseases.push("Cholera");
                                diseases.push("Leptospirosis");
                                break;
                            case "Rash":
                                diseases.push("Allergic reaction");
                                diseases.push("Eczema");
                                diseases.push("Meningitis");
                                break;
                            case "Dizziness":
                                diseases.push("Stroke");
                                diseases.push("Vertigo");
                                break;
                            case "Difficulty swallowing":
                                diseases.push("Stroke");
                                diseases.push("Esophageal stricture");
                                diseases.push("Meningitis");
                                break;
                            // Add more cases as needed
                        }
                    });

                    // Remove duplicates from diseases array
                    const uniqueDiseases = [...new Set(diseases)];

                    if (uniqueDiseases.length === 0) {
                        result += "<p>No matching diseases found</p>";
                    } else {
                        result += "<ul>";
                        uniqueDiseases.forEach(disease => {
                            // Map diseases to corresponding departments or specialties
                            const department = mapDiseaseToDepartment(disease);
                            result += `<li>${disease}: ${department}</li>`;
                        });
                        result += "</ul>";
                    }
                }

                document.getElementById("result").innerHTML = result;
            }

            // Function to map diseases to corresponding departments or specialties
            function mapDiseaseToDepartment(disease) {
                switch (disease) {
                    case "Tuberculosis":
                    case "Japanese encephalitis":
                    case "Pneumonia":
                    case "Rabies":
                    case "Anthrax":
                    case "Avian influenza":
                    case "Cholera":
                    case "Malaria":
                    case "Typhoid":
                    case "Dysentery":
                    case "Leptospirosis":
                        return "Infectious Diseases";
                    case "Diabetes":
                        return "Endocrinology";
                    case "Heart diseases":
                    case "Stroke":
                        return "Cardiology";
                    case "Neonatal sepsis":
                        return "Pediatrics";
                    case "Cancer":
                        return "Oncology";
                    case "Dizziness":
                    case "Vertigo":
                        return "Neurology";
                    case "Abdominal pain":
                        return "Gastroenterology";
                    case "Rash":
                        return "Dermatology";
                    case "Difficulty swallowing":
                        return "Otorhinolaryngology (ENT)";
                    // Add more cases as needed
                    default:
                        return "General Medicine";
                }
            }
        </script>
</body>

</html>