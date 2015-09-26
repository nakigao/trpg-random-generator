<div class="row">
    <div class="col-sm-12">
        <p>リアル世界のキャラクターをランダムに生成します。</p>
    </div>
</div>
{{ form('action': '.', 'method': 'post') }}
<div class="row">
    <div class="col-sm-12">
        <input type="hidden" name="call_action" value="generate_all">
        <input type="hidden" name="token" value="{{ security.getToken() }}">
        {{ submit_button('GENERATE') }}
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        {{ select_static('nation', ['all': 'ALL', 'en': 'EN', 'ja': 'JA', 'de': 'DE', 'ru': 'RU'], 'useEmpty': false, 'width': 75, 'style': 'width: 75px') }}
        {{ select_static('gender', ['all': 'ALL', 'male': 'Male', 'female': 'Female'], 'useEmpty': false, 'width': 75,  'style': 'width: 75px') }}
    </div>
</div>
{{ end_form() }}

<hr>

<div class="row">
    <div class="col-sm-4">
        <p>GENDER</p>
    </div>
    <div class="col-sm-8">
        {% if gender is empty %}
            <p>-</p>
        {% else %}
            <p>{{ gender }}</p>
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>PARENT</p>
    </div>
    <div class="col-sm-8">
        {% if parent is empty %}
            <p>-</p>
        {% else %}
            <p>[父] {{ parent['father'] }}</p>
            <p>[母] {{ parent['mother'] }}</p>
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>NORMAL NAME</p>
    </div>
    <div class="col-sm-8">
        {% if normalNames is empty %}
            <p>-</p>
        {% else %}
            {% for normalName in normalNames %}
                <p>{{ normalName['body_kana'] }}</p>
                <p>{{ normalName['body'] }}</p>
            {% endfor %}
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>ANOTHER NAME</p>
    </div>
    <div class="col-sm-8">
        {% if anotherNames is empty %}
            <p>-</p>
        {% else %}
            {% for anotherName in anotherNames %}
                <p>{{ anotherName }}</p>
            {% endfor %}
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>PERSONALITY</p>
    </div>
    <div class="col-sm-8">
        {% if personalities is empty %}
            <p>-</p>
        {% else %}
            {% for personality in personalities %}
                <p>{{ personality }}</p>
            {% endfor %}
        {% endif %}
    </div>
</div>

<br>