<div class="row">
    <div class="col-sm-12">
        <p>リアル世界のキャラクターをランダムに生成します。</p>
    </div>
</div>
{{ form('action': 'real', 'method': 'post') }}
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
        <?php
        echo $this->tag->select(
        array(
        'nation',
        MasterNations::find("is_available = TRUE"),
        'using' => array('nation_id', "body_ja"),
        'useEmpty' => false,
        'width' => 150,
        'style' => 'width: 150px'
        )
        );
        ?>
        <?php
        echo  $this->tag->select(
        array(
        'gender',
        MasterGenders::find("is_available = TRUE"),
        'using' => array('gender_id', "body_ja"),
        'useEmpty' => false,
        'width' => 150,
        'style' => 'width: 150px'
        )
        );
        ?>
        <?php
        echo  $this->tag->select(
        array(
        'range_of_age',
        MasterAges::find("type='real' AND is_available = TRUE"),
        'using' => array('age_id', "body_ja"),
        'useEmpty' => false,
        'width' => 150,
        'style' => 'width: 150px'
        )
        );
        ?>
    </div>
</div>
{{ end_form() }}

<hr>


<div class="row">
    <div class="col-sm-4">
        <p>NAME</p>
    </div>
    <div class="col-sm-8">
        {% if normalNames is empty %}
            <p>-</p>
        {% else %}
            {% for normalName in normalNames %}
                <p>{{ normalName['body_kana'] }}</p>
                {#<p>{{ normalName['body'] }}</p>#}
            {% endfor %}
        {% endif %}
    </div>
</div>

<br>

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
        <p>AGE</p>
    </div>
    <div class="col-sm-8">
        {% if age is not defined %}
            <p>-</p>
        {% else %}
            <p>{{ age }}</p>
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>BIRTH</p>
    </div>
    <div class="col-sm-8">
        {% if birthdayInformation is empty %}
            <p>-</p>
        {% else %}
            {% if birthdayInformation['astrology'].name is empty %}
                <p>不明</p>
            {% else %}
                <p>{{ birthdayInformation['month'] }}月{{ birthdayInformation['day'] }}日 ({{ birthdayInformation['astrology'].name }})</p>
            {% endif %}
        {% endif %}
    </div>
</div>

<br>

<div class="row">
    <div class="col-sm-4">
        <p>PARENTS</p>
    </div>
    <div class="col-sm-8">
        {% if parent is empty %}
            <p>-</p>
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