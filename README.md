# TechnologyAdvice Test Drive

### Running the project
- [x] Create a `.env` file and copy the contents of `.env.example`
- [x] Run `composer install` & `npm install`
- [x] Run `php artisan key:generate`
- [x] Run `php artisan serve`
- [x] In a duplicate terminal tab, run `npm run watch` to compile assets and start the watch
- [x] Go to `http://127.0.0.1:8000` in your browser

---

### Main objectives
You are provided a question object with the following properties: an array of question answer values, full question text, an abbreviated display text, question type, whether or not the question is considered required, and keyword tags.

Create a page where a user can perform the following tasks:
- [x] View the main question info
- [x] Open a modal and edit the question info
- [x] View a list of the answer values
- [x] Add an additional answer value (should append to the list without a page refresh)
- [x] Delete an answer value

#### A note from TA:
This test is meant to give you an opportunity to showcase your strengths and experience. It involves full-stack work but we encourage you to shine in your areas of interest.

We haven't provided a mockup or any specified design guidelines. We won't be assessing the work based on the visual aesthetics (unless it's fantastic, at which point, props!) yet we do want to see your ability to turn the provided data and project requirements into a functional interface.

---

### Backend
Using the provided data object, setup a database, models, and create a controller that returns a `$question` to the view. The controller should have methods for showing and updating questions, as well as methods for adding and deleting answer values.

```json
'{ "question": {
        "answer_values": [
            "Answer Value A",
            "Answer Value B",
            "Answer Value C",
            "Answer Value D",
            "Answer Value E"
        ],
        "keywords": [ "software", "nashville" ],
        "question_text": "Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur?",
        "required": true,
        "type": "Checkbox"
    }
}'
```

### Frontend
The main question information should be displayed using the Blade template. (Main view: `resources/views/test-drive.blade.php`) 
Please use VueJS to create an edit modal. Vue will most likely be needed for deleting answer values and re-fetching the answer list.

Bootstrap layout utilities and classes are available for use. We prefer you to use Bootstrap on the page since it is used across all TA front-end projects. However, feel free to add additional CDNs if Bootstrap is a blocker to your progress.

#### CSS & Styling
A custom SCSS file is available at `resources/assets/sass/_main.scss`. Icons can be added using FontAwesome classes. A square TechnologyAdvice logo is included in `public/img/logo/technologyadvice-logo-square-light-300px` if you choose to include it.

---

### If time allows...
If you complete the main objectives of the project:
- Add PHPUnit testing
- Add FE testing (Dusk or Jest preferred)

## Personal Notes
### To setup the database, run the following commands:
```
php artisan migrate
php artisan db:seed
```
### TODO
- [ ] Edit edits the actual vue object. If you click cancel, the edit persists locally, but not at the database. Temporary variables should be used.
- [ ] Nothing was done with keywords
- [ ] Changing question required/type does not affect the layout of the question
- [ ] The question component hardcodes 1 as the question id
- [ ] The question component uses individual variables rather than a model with all needed data (see previous todo)
- [ ] The answer parts of the question component should be split into their own component (needs state management?)
- [ ] Most of the controller functions should be api calls
- [ ] The vue implementation feels hacked. A portion of this is probably because of lack of api calls (I had to simulate form posts for everything).
- [ ] Answers model allows you to mass assign question_id. A user should be verified they have read access to the question_id before persisting
- [ ] I hate the button layout/color/etc
- [ ] There should probably be a seeder per database table.
- [ ] There is no validation
- [ ] Unit testing
- [ ] General styling
- [ ] Github vulnerabilities