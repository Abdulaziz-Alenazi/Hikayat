#import required libraries 

import requests
from flask import Flask, request, jsonify, render_template_string, send_from_directory
from access import generate_token

import base64
import requests
import os
import base64
from io import BytesIO
import numpy as np
from PIL import Image
import random

from elevenlabs import VoiceSettings
from elevenlabs.client import ElevenLabs
from io import BytesIO
from pydub import AudioSegment
from pydub.playback import play
import os
import random


# generate IBM token key
access_token = generate_token()

app = Flask(__name__)

#generate a story from Allam model using API

def Generate_Story(Habit):
    url = "https://eu-de.ml.cloud.ibm.com/ml/v1/text/generation?version=2023-05-29"

    body = {
        "input": f"""قم بكتابة قصة قصيرة خيالية للأطفال تستهدف حل مشكلة سلوكية مثل [العناد/الكذب/السرقة] بطريقة إبداعية وملهمة. يجب أن تكون القصة مناسبة للأطفال وتعبر عن أهمية القيم الأخلاقية بطريقة مبسطة. يجب أن تكون النهايات إيجابية ومحفزة. وتكون في طابع طفولي محفز للقراءة. قم بكتابة قصص مختلفة عن الامثلة المقدمة لك.
    Input: العناد
    Output:  في يوم من الأيام، كان هناك ولد صغير يدعى علي. كان علي معروفًا بين أصدقائه بأنه عنيد ولا يستمع إلى نصائح الكبار. في يوم من الأيام، قرر علي أن يلعب لعبة الغميضة بمفرده دون أن يخبر أحدًا. بعد فترة من الزمن، شعر علي بالضياع ولم يتمكن من العثور على طريق عودته إلى المنزل.

    في هذه الأثناء، كان والدا علي يبحثان عنه بقلق شديد. بعد ساعات من البحث، وجدا علي وهو يبكي ويصرخ طالبًا المساعدة. عندما سألوه عن سبب خروجه بمفرده وعدم الاستماع لنصائحهم، أدرك علي خطأه واعتذر لوالديه.

    منذ ذلك اليوم، تعلم علي أهمية الاستماع إلى نصائح الكبار والتعاون مع أصدقائه. بدأ يشارك في الألعاب الجماعية ويتبع توجيهات والديه وأصدقائه. تحسنت علاقاته مع الآخرين وأصبح أكثر سعادة وثقة بنفسه.

    في النهاية، تعلم علي أن العناد ليس الحل الأمثل وأن التعاون والاستماع للآخرين يمكن أن يساعده في تحقيق أهدافه والاستمتاع بالحياة بشكل

    Input: السرقة
    Output:  في قرية صغيرة، كان هناك صبي يدعى أحمد. كان أحمد معروفًا بأنه طفل ذكي وموهوب، لكن لديه مشكلة في السرقة. كان يأخذ أشياء من أصدقائه وزملائه دون أن يسأل أو يستأذن.

    في يوم من الأيام، قرر أحمد أن يسرق لعبة جميلة من صديقه محمد. بعد أن أخذ اللعبة، شعر أحمد بالذنب والندم على فعلته. قرر أن يعيد اللعبة ويعتذر لمحمد.

    عندما عاد أحمد باللعبة إلى محمد، اعتذر له عن فعلته وشرح له أنه تعلم درسًا مهمًا. محمد سامحه وقرر أن يساعده في تحسين سلوكه.

    منذ ذلك اليوم، بدأ أحمد في تغيير سلوكه وتعلم أهمية الأمانة والصدق. بدأ يشارك أصدقاءه في ألعابهم ويشاركهم أفكاره وإبداعاته. تحسنت علاقاته مع الآخرين وأصبح أكثر ثقة بنفسه ومحبوبًا بين أصدقائه.

    في النهاية، تعلم أحمد أن السرقة ليست الحل الأمثل وأن الأمانة والصدق يمكن أن تساعده في بناء علاقات قوية وناجحة مع الآخرين. 


    Input: الكذب
    Output: 

    في قرية جميلة، كان هناك فتاة صغيرة تدعى ليلى. كانت ليلى معروفة بأنها صادقة وأمينة، لكن في بعض الأحيان كانت تكذب عندما تشعر بالخوف أو الإحراج.

    في يوم من الأيام، كانت ليلى تلعب مع أصدقائها عندما أسقطت إحدى صديقاتها لعبة بالخطأ. شعرت ليلى بالخوف من أن صديقتها ستغضب منها، فقررت أن تكذب وتقول إن اللعبة لم تكن لها من البداية.

    بعد فترة قصيرة، اكتشفت ليلى أن صديقتها عرفت بأمر كذبها وشعرت بالحزن والغضب. أدركت ليلى أن الكذب ليس الحل الأمثل وأن الصدق هو السبيل الأفضل لبناء الثقة والصداقة.

    قررت ليلى أن تعتذر لصديقتها وتشرح لها سبب كذبها. سامحتها صديقتها وقررت مساعدتها في تحسين سلوكها.

    منذ ذلك اليوم، بدأت ليلى في تغيير سلوكها وتعلم أهمية الصدق والأمانة. بدأت تشارك أصدقائها بمشاكلها ومخاوفها بصدق وشفافية. تحسنت علاقاتها مع الآخرين وأصبحت أكثر ثقة بنفسها ومحبوبة بين أصدق

    Input: عامة
    Output: كان هناك عصفور صغير يُدعى فرفور، وكان يعيش في غابة مليئة بالأشجار والأزهار الجميلة. كان فرفور يحب الطيران والتحليق فوق الأشجار، لكنه كان يخاف من الطيران بعيدًا عن عشه، حيث كان يشعر بالأمان هناك.

    في يوم من الأيام، أخبره والده أن عليهم الذهاب إلى مكان بعيد للبحث عن الطعام، لكن فرفور كان مترددًا وخائفًا من الابتعاد. نظر إليه والده بلطف وقال له: \"الشجاعة ليست في أن لا نخاف، بل في أن نواجه مخاوفنا ونحاول التغلب عليها.\"

    أخذ فرفور نفسًا عميقًا، وقرر المحاولة. طار مع والده، وفي البداية كان قلبه يخفق بشدة، لكنه مع مرور الوقت بدأ يشعر بالراحة ويستمتع بجمال الطبيعة من حوله. رأى أزهارًا لم يكن يعرف أنها موجودة، وسمع أصوات الطيور الأخرى وهي تغني بفرح.

    بعد عودته إلى عشه، شعر فرفور بالفخر لأنه تغلب على خوفه واستطاع الطيران بعيدًا. ومنذ ذلك اليوم، أصبح فرفور أكثر شجاعة واستعدادًا لاكتشاف أماكن جديدة. تعلم أن الشجاعة تأتي من المحاولة والتجربة، وأن العالم مليء بالأشياء الجميلة التي تنتظر من يكتشفها.

    Input: {Habit}
    Output:""",
        "parameters": {
            "decoding_method": "sample",
            "max_new_tokens": 256,
            "temperature": 0.7,
            "top_k": 50,
            "top_p": 1,
            "repetition_penalty": 1.1
        },
        "model_id": "sdaia/allam-1-13b-instruct",
        "project_id": "56604557-7e59-4eeb-b46b-2eb23755f361"
    }

    headers = {
        "Accept": "application/json",
        "Content-Type": "application/json",
        "Authorization": f"Bearer {access_token}"
    }

    response = requests.post(
        url,
        headers=headers,
        json=body
    )

    if response.status_code != 200:
        raise Exception("Non-200 response: " + str(response.text))

    return response.json()['results'][0]['generated_text']


#/////////////////


from deep_translator import GoogleTranslator
# Translate from Arabic to English
def translate_ar_to_en(text):
    translator = GoogleTranslator(source='auto', target='en')
    translation = translator.translate(text)
    return translation



api_key = 'sk-X88DFYHsgjkzKOp1twOETCftP3mCoZ2jAAzl66BMJZVBKQ0K'
url = "https://api.stability.ai/v1/generation/stable-diffusion-xl-1024-v1-0/text-to-image"

# Generate images from Satbility using API
def generate_image(prompt):
    prompt_en = translate_ar_to_en(prompt)

    body = {
    "steps": 40,
    "width": 1024,
    "height": 1024,
    "seed": 0,
    "cfg_scale": 5,
    "samples": 1,
    'style_preset': "digital-art",
    "text_prompts": [
      {
        "text": prompt_en,
        "weight": 1
      },
      {
        "text": "blurry, bad",
        "weight": -1
      }
    ],
  }

    headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
    "Authorization": f"Bearer {api_key}",
    }

    response = requests.post(
    url,
    headers=headers,
    json=body,
    )

    if response.status_code != 200:
      raise Exception("Non-200 response: " + str(response.text))

    data = response.json()


    # make sure the image directory exists
    if not os.path.exists("/var/www/html/image"):
      os.makedirs("/var/www/html/image")

    for i, image in enumerate(data["artifacts"]):
      name = image["seed"]
      with open(f'/var/www/html/image/{name}.png', "wb") as f:
          image_data = base64.b64decode(image["base64"])
          f.write(image_data)
    #images will be save on Hikayat Allam server
          return f'https://Allamstories.tech/image/{name}.png'
    
# Convert text to speech using ElevenLabs using API
def text_to_speech_stream(text: str):
    ELEVENLABS_API_KEY = 'sk_06bd26967229a0897ca4f8252fa78e4f05f194a86dd9de91' 
    client = ElevenLabs(
        api_key=ELEVENLABS_API_KEY,
    )

    response = client.text_to_speech.convert(
    voice_id="Xb7hH8MSUJpSbSDYk0k2",
    optimize_streaming_latency="0",
    output_format="mp3_22050_32",
    text=text,
    model_id="eleven_multilingual_v2",
    voice_settings=VoiceSettings(
        stability=0.75,         
        similarity_boost=0.75,  
        style=0.0,
        use_speaker_boost=True,
        ),
    )

    audio_data = BytesIO()
    
    for chunk in response:
        if chunk:
            audio_data.write(chunk)

    audio_data.seek(0)

    sound = AudioSegment.from_file(audio_data, format="mp3")

    # make sure the image directory exists
    if not os.path.exists("/var/www/html/audio"):
        os.makedirs("/var/www/html/audio")
        
    name = name = random.randint(1000, 999999)
    output_filename = f"{name}.mp3"
    print(output_filename)
    sound.export(f'/var/www/html/audio/{output_filename}', format="mp3")
    #Audio will be save on Hikayat Allam server
    return f'https://Allamstories.tech/audio/{output_filename}'

# Splite statment to sentences
def splite(statment):
    return statment.split('.')

# make a json content stories, images and audio files.
def Generate_Images(story):
    json = {}

    clean_story = story.replace("\n", "")
    statments = splite(clean_story)
    statments = statments[:-1]

    count = 0  # Initialize a counter

    for idx, txt in enumerate(statments):
        path = generate_image(txt)
        audio = text_to_speech_stream(txt)
        json['content_' + str(idx)] = {'content': txt, 'image': path, 'audio': audio}


    return json

#////////////////


#Flask view function that retrieves and serves an image file stored in a specific directory on the server.
@app.route('/out/<path:filename>')
def serve_image(filename):
    image_directory = '/home/ubuntu/Allam/mysite/out'
    return send_from_directory(image_directory, filename)



# Flask route to generate a story based on a specific habit and then create an image and audio related to that story.
@app.route('/generate_story_image', methods=['POST'])
def Json_Story_Image():
    habit = request.form.get('habit')
    if not habit:
        return jsonify({'error': 'Habit is required'}), 400

    Story = Generate_Story(habit)
    return jsonify(Generate_Images(Story))

@app.route('/')
def index():
    html_form = '''
    <!doctype html>
    <html lang="ar">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Generate Story and Image</title>
      </head>
      <body>
        <h1>Generate Story and Image for a Habit</h1>
        <form action="/generate_story_image" method="post">
          <label for="habit">Enter a Habit:</label>
          <input type="text" id="habit" name="habit" required>
          <button type="submit">Generate</button>
        </form>
      </body>
    </html>
    '''
    return render_template_string(html_form)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5009)
