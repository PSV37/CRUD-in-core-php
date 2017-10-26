// Validation errors messages for Parsley
// Load this after Parsley

Parsley.addMessages('en', {
  dateiso:  "This field should be a valid date (YYYY-MM-DD).",
  minwords: "This field is too short. It should have %s words or more.",
  maxwords: "This field is too long. It should have %s words or fewer.",
  words:    "This field length is invalid. It should be between %s and %s words long.",
  gt:       "This field should be greater.",
  gte:      "This field should be greater or equal.",
  lt:       "This field should be less.",
  lte:      "This field should be less or equal.",
  notequalto: "This field should be different."
});
