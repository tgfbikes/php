class Kid < ActiveRecord::Base
  belongs_to :parent

  validates_presence_of :fname
  validates_presence_of :lname
  validates_presence_of :age
  validates_presence_of :sex

  mount_uploader :picture, PictureUploader
end
