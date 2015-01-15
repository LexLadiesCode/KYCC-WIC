---
layout: post
title: Agenda
permalink: /agenda/
---

<div class="col-md-12">

{% for agenda_hash in site.data.agenda %}
  {% assign agenda = agenda_hash[1] %}
  <h3>{{ agenda.readable-date }}</h3>
  
  {% for times in agenda.times %}
    <div class="row" style="border-top:solid 1px #f1f1f1;">
      <div class="col-md-2">
        <p>{{ times.start }} to {{ times.end }}</p>
      </div>
      <div class="col-md-10">
        <div class="row">
          {% assign count = times.sessions | size %}
          {% assign size = 12 | divided_by: count %}
          {% for session in times.sessions %}
              <div class="col-md-{{ size }}">
                <h3>{{ session.title }}</h3>
                <p>
                  {{ session.location }}
                </p>
                {% for speaker in session.speakers %}
                  <p>
                    {{ speaker.name }}
                  </p>
                {% endfor %}
              </div>
          {% endfor %}
        </div>
      </div>
    </div>
  {% endfor %}

{% endfor %}


</div>

