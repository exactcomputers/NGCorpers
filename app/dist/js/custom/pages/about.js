const dataRequest = async () => {
  const response = await fetch("./dist/data.json");
  const json = await response.json();
  return json;
};

const about = document.getElementById("about-us");
const contact = document.getElementById("contact-us");
const faqs = document.getElementById("faqs");
const guidelines = document.getElementById("guidelines");
const terms = document.getElementById("terms");
const privacy = document.getElementById("privacy");

if (about) {
  dataRequest().then((json) => {
    about.innerHTML = json.aboutUs;
  });
}

if (terms) {
  dataRequest().then((json) => {
    terms.innerHTML = json.terms;
  });
}

if (guidelines) {
  dataRequest().then((json) => {
    guidelines.innerHTML = json.guidelines;
  });
}

if (privacy) {
  dataRequest().then((json) => {
    privacy.innerHTML = json.privacy;
  });
}

if (contact) {
  dataRequest().then((json) => {
    contact.innerHTML = json.contactUs;
  });
}

const toggleFaq = () => {
  var collapsed = document.getElementsByClassName("collapsed");
  if (collapsed) {
    var i;
    for (i = 0; i < collapsed.length; i++) {
      collapsed[i].addEventListener("click", function () {
        this.classList.toggle("active");

        var collapse = this.nextElementSibling;
        if (collapse.style.display === "block") {
          collapse.style.display = "none";
        } else {
          collapse.style.display = "block";
        }
      });
    }
  }
};

if (faqs) {
  dataRequest().then((json) => {
    if (json.faqs) {
      let faqsContent = "";
      for (let i = 0; i < json.faqs.length; i++) {
        const el = json.faqs[i];
        faqsContent += `<button type="button" class="accordion collapsed" data-toggle="collapse" data-target="#collapse${i}" aria-expanded="true" aria-controls="collapse${i}">${el.question}</button>
        <div id="collapse${i}" class="panel collapse" aria-labelledby="heading${i}" data-parent="#accordionExample">
            ${el.answer}
        </div>`;
      }
      faqs.innerHTML = `<h2 class="tt-title">Frequently Asked Questions</h2>&nbsp;
      <div class="accordion-wrapper" id="accordionExample">
      ${faqsContent}
      </div>`;
    }
    toggleFaq();
  });
}

const getSiteStatistics = async () => {
  const statistics = document.getElementById("site-statistics");
  let data = "";
  if (statistics) {
    try {
      const response = await fetch(basePath("pages/index"));
      const resp = await response.json();
      // console.log(resp);
      if (resp.topics) {
        let e = resp.topics;
        data += `<tr>
                    <td>Topics</td>
                    <td>${e.all_time}</td>
                    <td>${e.last_7}</td>
                    <td>${e.last_30}</td>
                </tr>`;
      }
      if (resp.posts) {
        let e = resp.posts;
        data += `<tr>
                    <td>Posts</td>
                    <td>${e.all_time}</td>
                    <td>${e.last_7}</td>
                    <td>${e.last_30}</td>
                </tr>`;
      }
      if (resp.users) {
        let e = resp.users;
        data += `<tr>
                    <td>Users</td>
                    <td>${e.all_time}</td>
                    <td>${e.last_7}</td>
                    <td>${e.last_30}</td>
                </tr>`;
      }
      if (resp.active_users) {
        let e = resp.active_users;
        data += `<tr>
                    <td>Active Users</td>
                    <td>${e.all_time}</td>
                    <td>${e.last_7}</td>
                    <td>${e.last_30}</td>
                </tr>`;
      }
      if (resp.likes) {
        let e = resp.likes;
        data += `<tr>
                    <td>Likes</td>
                    <td>${e.all_time}</td>
                    <td>${e.last_7}</td>
                    <td>${e.last_30}</td>
                </tr>`;
      }
      statistics.innerHTML = data;
    } catch (error) {
      console.error(error);
    }
  }
};
