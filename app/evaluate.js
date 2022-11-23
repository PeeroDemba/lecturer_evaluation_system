// Get elements
const  tableElem = document.querySelector("table");
const qualities = [
  "Ability to control the class",
  "Ability to draw attention of the class",
  "Personality towards opposite gender",
  "Non-display of favouritism to particular students",
  "Your personal likeness for the lecturer",
  "Ability to maintain discipline in class",
  "Interest in teaching job",
  "Show of consistent behaviour to all students",
  "Always willing to help students",
  "Ability to motivate students to learn",
  "Self-preparation before the commencement of lecture",
  "Composure during lecture",
  "Communication skills (fluency, audibility)",
  "Understanding of the subject matter",
  "Usage of the right teaching methods",
  "Ability to give illustration that drive home points",
  "Attitude and disposition to teaching",
  "Presence and punctuality to class", 
  "Conduct of continuous assessment",
  "Academic soundness"
];

const others = [
  "academic_session",
  "academic_semester",
  "lecturer_email",
  "dept",
  "course_title",
  "course_code",
  "unit"
];

qualities.forEach((quality, idx) => {
  tableElem.innerHTML += `
<tr>
  <td>${quality}</td>
  <td><input type="radio" name="n-${idx}" value="5"></td>
  <td><input type="radio" name="n-${idx}" value="4"></td>
  <td><input type="radio" name="n-${idx}" value="3"></td>
  <td><input type="radio" name="n-${idx}" value="2"></td>
  <td><input type="radio" name="n-${idx}" value="1"></td>
</tr>
  `;
});

async function submitEvaluation() {
  this.event.preventDefault();
  const result = {
    qualities: {}
  };
  others.forEach(formElem => result[formElem] = this.event.target[formElem].value);
  qualities.forEach((formElem, idx) => {
    result.qualities[formElem] = this.event.target["n-" + idx].value;
  });

  try {
    const res = await fetch("/website/evaluate.php", {
      method: "POST",
      body: JSON.stringify(result),
      headers: {
        "Content-Type": "application/json"
      }
    });
    const data = await res.json();
    console.log(data);
    if(data.success === true) {
      alert("Submitted, Thanks for your time!");
      window.location.href = "/website";
    }
  } catch (err) {
    console.log(err);
    alert("Sorry something happened");
  }
}