from flask import Flask, request, jsonify # type: ignore
from flask_cors import CORS # type: ignore

app = Flask(__name__)
CORS(app)

# Simulated AI response (you can replace this with AI model integration like OpenAI GPT)
def ai_response(user_message):
    return f"AI Response to: '{user_message}'"

@app.route('/chat', methods=['POST'])
def chat():
    user_message = request.json.get('message')
    response = ai_response(user_message)
    return jsonify({"response": response})

if __name__ == '__main__':
    app.run(debug=True)

from flask import Flask, request, jsonify # type: ignore
from flask_cors import CORS # type: ignore
import openai # type: ignore

app = Flask(__name__)
CORS(app)

# Set your OpenAI API key
openai.api_key = 'your_openai_api_key'

@app.route('/generate-image', methods=['POST'])
def generate_image():
    data = request.json
    prompt = data.get('prompt')

    if not prompt:
        return jsonify({"error": "No prompt provided"}), 400

    try:
        # Generate image using DALL·E
        response = openai.Image.create(
            prompt=prompt,
            n=1,
            size="512x512"
        )
        image_url = response['data'][0]['url']
        return jsonify({"image_url": image_url})
    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == '__main__':
    app.run(debug=True)

