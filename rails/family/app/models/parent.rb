class Parent < ActiveRecord::Base
  has_many :kids

  validates_presence_of :fname
  validates_presence_of :lname
  validates_presence_of :age
  validates_presence_of :sex
end
